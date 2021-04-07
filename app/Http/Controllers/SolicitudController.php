<?php

namespace App\Http\Controllers;


use App\Models\Solicitud;
use App\Models\Carrera;
use App\Models\InfoAcademica;
use App\Models\InfoDocente;
use App\Models\InfoInstancia;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use Carbon\Carbon;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitud = DB::table('solicituds')->latest('id')->first();
        if ($solicitud == null) $solicitud = $solicitud + 1;
        else $solicitud = $solicitud->id + 1;

        $carreras = carrera::all();
        return view('profesores.prof_crear-solicitud', compact('carreras'), compact('solicitud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //valida campos de la carrera
        $request->validate([
            'diaSolicitud'   => 'required|numeric|max:31',
            'anioSolicitud'  => 'required|numeric|regex:/\d{4}$/',
            'numVisita'      => 'numeric',
            'visitasDe'      => 'required|regex:/^\d[D]\d/',
            'asignatura1'    => 'required|string',
            'semestre1'      => 'required|numeric',
            'numAlumnos1'    => 'required|numeric',
            'asignatura2'    => 'nullable|string',
            'semestre2'      => 'nullable|numeric',
            'numAlumnos2'    => 'nullable|numeric',
            'totalAlumn'     => 'numeric',
            'objetivo'       => 'required|string'

        ], [
            'diaSolicitud.max'       => 'El dia no debe ser ser mayor a 31',
            'diaSolicitu.regex'      => 'No cumple con el formato establecido',
            'anioSolicitud.regex'    => 'No cumple con el formato establecido',
            'numVisita.required'     => 'El numero de visita es obligatorio',
            'visitasDe.regex'        => 'No cumple con el formato establecido',
            'objetivo.required'      => 'El objetivo es obligatorio'
        ]);

        //Valida campos del docente
        $request->validate([
            /*  'docentePrinc'           => 'required|string',
           'emailPrinc'             => 'required|email',
           'telefonoPrinc'          => 'required|numeric', */

            'docenteAcom'            => 'nullable|string',
            'emailAcom'              => 'nullable|email',
            'telefonoAcom'           => 'nullable|numeric',

            'docenteSupl'            => 'nullable|string',
            'emailSupl'              => 'nullable|email',
            'telefonoSupl'           => 'nullable|numeric',

        ], [
            'docentePrinc.required'           => 'Es obligatorio un docente principal',
            'emailPrinc.required'             => 'Es obligatorio un email',
            'telefonoPrinc.required'          => 'Es obligatorio un telefono'

        ]);

        //valida campos de la instancia
        $request->validate([
            'fecha'                  => 'required|date|after:+1 week',
            'hora'                   => 'required',
            'instancia'              => 'required|string',
            'entidad'                => 'required|string',
            'domicilio'              => 'nullable|string',
            'contacto'               => 'nullable|string',
            'puesto'                 => 'nullable|string',
            'telContacto'            => 'nullable|numeric',


            'instanciaSust'              => 'nullable|string',
            'entidadSust'                => 'nullable|string',
            'domicilioSust'              => 'nullable|string',
            'contactoSust'               => 'nullable|string',
            'puestoSust'                 => 'nullable|string',
            'telContactoSust'            => 'nullable|numeric',
        ], [
            'fecha.after'               => 'La fecha debe de ser una fecha posterior.',
            'telContacto.numeric'       => 'El telefono debe de ser numerico',
            'telContactoSust.'          => 'El telefono debe de ser numerico'
        ]);



        $numVisita = $request->numVisita + 1;
        $carreraAbreviado = Carrera::find($request->carrera)->abreviatura;
        if ($request->numVisita < 9) $folio = $carreraAbreviado . $request->diaSolicitud . $request->mesSolicitud . $request->anioSolicitud . '0' . $numVisita . $request->tipoVisita . $request->visitasDe;
        else $folio = $carreraAbreviado . $request->diaSolicitud . $request->mesSolicitud . $request->anioSolicitud . $numVisita . $request->tipoVisita . $request->visitasDe;
        $user = Auth::user();

        $folioDB = DB::table('solicituds')->where('folio', $folio)->get();
        if (count($folioDB) != 0) {
            return back()->withErrors(['folio' => 'El número de folio ya se encuentra registrado.']);
        }



        DB::table('solicituds')->insert([
            'folio'             => $folio,
            'autorizacion'      => 2,
            'user_id'           => $user->id
        ]);

        $solicitudId = DB::table('solicituds')
            ->latest('id')
            ->first();

        DB::table('info_academicas')->insert([
            'asignatura1'       => $request->asignatura1,
            'semestre1'         => $request->semestre1,
            'numAlumnos1'       => $request->numAlumnos1,
            'asignatura2'       => $request->asignatura2,
            'semestre2'         => $request->semestre2,
            'numAlumnos2'       => $request->numAlumnos2,
            'totalAlumnos'      => $request->totalAlumn,
            'objetivo'          => $request->objetivo,
            'solicitud_id'      => $solicitudId->id,
            'carrera_id'        => $request->carrera
        ]);

        DB::table('info_docentes')->insert([
            'docentePrincipal'    => Auth::user()->nombre . " " . Auth::user()->apellidop . " " . Auth::user()->apellidom,
            'emailPrincipal'      => Auth::user()->email,
            'telefonoPrincipal'   => Auth::user()->telefono,
            'docenteAcom'         => $request->docenteAcom,
            'emailAcom'           => $request->emailAcom,
            'telefonoAcom'        => $request->telefonoAcom,
            'docenteSuplente'     => $request->docenteSupl,
            'emailSuplente'       => $request->emailSupl,
            'telefonoSuplente'    => $request->telefonoSupl,
            'solicitud_id'        => $solicitudId->id
        ]);

        DB::table('info_instancias')->insert([
            'instancia'             => $request->instancia,
            'entidad'               => $request->entidad,
            'fecha'                 => $request->fecha,
            'hora'                  => $request->hora,
            'domicilio'             => $request->domicilio,
            'contacto'              => $request->contacto,
            'puesto'                => $request->puesto,
            'telefono'              => $request->telContacto,
            'correo'                => $request->emailContacto,
            'instanciaSustituta'    => $request->instanciaSust,
            'entidadSustituta'      => $request->entidadSust,
            'domicilioSustituta'    => $request->domicilioSust,
            'contactoSustituta'     => $request->contactoSust,
            'puestoSustituta'       => $request->puestoSust,
            'telefonoSustituta'     => $request->telContactoSust,
            'correoSustituta'       => $request->emailContactoSust,
            'solicitud_id'          => $solicitudId->id

        ]);


        return redirect()->action([SolicitudController::class, 'status']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {

        $datosSolicituds = DB::table('solicituds')
            ->join('info_instancias', 'solicituds.id', '=', 'info_instancias.solicitud_id')
            ->where('solicituds.user_id', '=', Auth::user()->id)
            ->select(
                'solicituds.id',
                'solicituds.folio',
                'solicituds.autorizacion',
                'info_instancias.instancia as empresa',
                'info_instancias.entidad as entidad',
                'info_instancias.fecha as fecha'
            )
            ->get();

        return view('profesores.prof_solicitudes', ['solicituds' => $datosSolicituds]);
    }

    public function status()
    {
        $statusSolicitud = DB::table('solicituds')
            ->join('info_instancias', 'solicituds.id', '=', 'info_instancias.solicitud_id')
            ->where('solicituds.user_id', '=', Auth::user()->id)
            ->select(
                'solicituds.id',
                'solicituds.folio',
                'solicituds.autorizacion',
                'solicituds.observaciones',
                'info_instancias.instancia as empresa',
                'info_instancias.entidad as entidad',
                'info_instancias.fecha as fecha'
            )
            ->get();
        return view('profesores.prof_status', ['solicituds' => $statusSolicitud]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud, $id)
    {
        $solicitud = $solicitud::find($id);
        $solicituds = DB::table('solicituds')
            ->join('info_academicas', 'solicituds.id', '=', 'info_academicas.solicitud_id')
            ->join('info_docentes', 'solicituds.id', '=', 'info_docentes.solicitud_id')
            ->join('info_instancias', 'solicituds.id', '=', 'info_instancias.solicitud_id')
            ->where('solicituds.id', $solicitud->id)
            ->select(
                'solicituds.*',
                'info_academicas.*',
                'info_docentes.*',
                'info_instancias.*'
            )
            ->get();

        return view('profesores.prof_editar-solicitud', ['solicituds' => $solicituds]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //valida campos de la carrera
        $request->validate([
            /* 'diaSolicitud'   => 'required|numeric|max:31',
                'anioSolicitud'  => 'required|numeric|regex:/\d{4}$/',
                'numVisita'      => 'numeric',
                'visitasDe'      => 'required|regex:/^\d[D]\d/', */
            'asignatura1'    => 'required|string',
            'semestre1'      => 'required|numeric',
            'numAlumnos1'    => 'required|numeric',
            'asignatura2'    => 'nullable|string',
            'semestre2'      => 'nullable|numeric',
            'numAlumnos2'    => 'nullable|numeric',
            'totalAlumn'     => 'numeric',
            'objetivo'       => 'required|string'

        ], [
            
            'objetivo.required'      => 'El objetivo es obligatorio'
        ]);

        //Valida campos del docente
        $request->validate([
            /*  'docentePrinc'           => 'required|string',
                'emailPrinc'             => 'required|email',
                'telefonoPrinc'          => 'required|numeric', */

            'docenteAcom'            => 'nullable|string',
            'emailAcom'              => 'nullable|email',
            'telefonoAcom'           => 'nullable|numeric',

            'docenteSupl'            => 'nullable|string',
            'emailSupl'              => 'nullable|email',
            'telefonoSupl'           => 'nullable|numeric',

        ], [
            'docentePrinc.required'           => 'Es obligatorio un docente principal',
            'emailPrinc.required'             => 'Es obligatorio un email',
            'telefonoPrinc.required'          => 'Es obligatorio un telefono'

        ]);

        //valida campos de la instancia
        $request->validate([
            'fecha'                  => 'required|date|after:+1 day',
            'hora'                   => 'required',
            'instancia'              => 'required|string',
            'entidad'                => 'required|string',
            'domicilio'              => 'nullable|string',
            'contacto'               => 'nullable|string',
            'puesto'                 => 'nullable|string',
            'telContacto'            => 'nullable|numeric',


            'instanciaSust'              => 'nullable|string',
            'entidadSust'                => 'nullable|string',
            'domicilioSust'              => 'nullable|string',
            'contactoSust'               => 'nullable|string',
            'puestoSust'                 => 'nullable|string',
            'telContactoSust'            => 'nullable|numeric',
        ], [
            'fecha.after'               => 'La fecha debe de ser una fecha posterior.',
            'telContacto.numeric'       => 'El telefono debe de ser numerico',
            'telContactoSust.'          => 'El telefono debe de ser numerico'
        ]);

        $solicitud = $solicitud::find($request->id);
        

        DB::table('info_academicas')
        ->join('solicituds','info_academicas.solicitud_id','=','solicituds.id')
        ->where('solicituds.id',$solicitud->id)
        ->update([
            'asignatura1'       => $request->asignatura1,
            'semestre1'         => $request->semestre1,
            'numAlumnos1'       => $request->numAlumnos1,
            'asignatura2'       => $request->asignatura2,
            'semestre2'         => $request->semestre2,
            'numAlumnos2'       => $request->numAlumnos2,
            'totalAlumnos'      => $request->totalAlumn,
            'objetivo'          => $request->objetivo
        ]);

        DB::table('info_docentes')
        ->join('solicituds','info_docentes.solicitud_id','=','solicituds.id')
        ->where('solicituds.id',$solicitud->id)
        ->update([
            'docentePrincipal'    => Auth::user()->nombre . " " . Auth::user()->apellidop . " " . Auth::user()->apellidom,
            'emailPrincipal'      => Auth::user()->email,
            'telefonoPrincipal'   => Auth::user()->telefono,
            'docenteAcom'         => $request->docenteAcom,
            'emailAcom'           => $request->emailAcom,
            'telefonoAcom'        => $request->telefonoAcom,
            'docenteSuplente'     => $request->docenteSupl,
            'emailSuplente'       => $request->emailSupl,
            'telefonoSuplente'    => $request->telefonoSupl
        ]);

        DB::table('info_instancias')
        ->join('solicituds','info_instancias.solicitud_id','=','solicituds.id')
        ->where('solicituds.id',$solicitud->id)
        ->update([
            'instancia'             => $request->instancia,
            'entidad'               => $request->entidad,
            'fecha'                 => $request->fecha,
            'hora'                  => $request->hora,
            'domicilio'             => $request->domicilio,
            'contacto'              => $request->contacto,
            'puesto'                => $request->puesto,
            'telefono'              => $request->telContacto,
            'correo'                => $request->emailContacto,
            'instanciaSustituta'    => $request->instanciaSust,
            'entidadSustituta'      => $request->entidadSust,
            'domicilioSustituta'    => $request->domicilioSust,
            'contactoSustituta'     => $request->contactoSust,
            'puestoSustituta'       => $request->puestoSust,
            'telefonoSustituta'     => $request->telContactoSust,
            'correoSustituta'       => $request->emailContactoSust
        ]);

        return redirect()->action([SolicitudController::class, 'show']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud, $id)
    {
        $solicitud = $solicitud::find($id);

        DB::table('solicituds')
            ->where('id', '=', $solicitud->id)
            ->update([
                'autorizacion' => 3
            ]);

        return redirect()->action([SolicitudController::class, 'show']);
    }


    public function validar(Request $request)
    {
    }

    //Funcion para el administrador
    public function allSolicitud()
    {
        $solicitudes = DB::table('solicituds')
            ->join('info_instancias', 'solicituds.id', '=', 'info_instancias.solicitud_id')
            ->join('info_docentes', 'solicituds.id', '=', 'info_docentes.solicitud_id')
            ->select(
                'solicituds.id',
                'solicituds.folio',
                'solicituds.autorizacion',
                'info_instancias.instancia as empresa',
                'info_docentes.docentePrincipal as docente',
                'info_docentes.emailPrincipal as email'
            )
            ->get();


        return view('admin.admin_solicitudes', ['solicitudes' => $solicitudes]);
    }


    //Funciones para el jefe de departamento
    public function solicitudesJefeDepto(){
        $solicitudes = DB::table('solicituds')
        ->join('users','solicituds.user_id','=','users.id')
        ->join('info_instancias', 'solicituds.id', '=', 'info_instancias.solicitud_id')
        ->join('info_docentes', 'solicituds.id', '=', 'info_docentes.solicitud_id')
        ->join('info_academicas','info_academicas.solicitud_id','=','solicituds.id')
        ->where('users.departamento_id',Auth::user()->departamento_id)
        ->get();
        
        return view('jefeDepto.jefe_solicitudes', ['solicitudes' => $solicitudes]);
    }

    public function completarSolicitud(Request $request){
        switch ($request->tipoSolicitud){
            case 1: 
                $tipoSolicitud = "Foránea institucional";
                DB::table('solicituds')
                ->where('id',$request->idSolicitud)
                ->update([
                    'tipoVisita'    => $tipoSolicitud
                ]);
                return redirect()->action([SolicitudController::class,'solicitudesJefeDepto']);
                break;

            case 2: 
                $tipoSolicitud = "Foránea autogenerada";
                DB::table('solicituds')
                ->where('id',$request->idSolicitud)
                ->update([
                    'tipoVisita'    => $tipoSolicitud
                ]);
                return redirect()->action([SolicitudController::class,'solicitudesJefeDepto']);
                break;

            case 3: 
                $tipoSolicitud = "Local con transporte";
                DB::table('solicituds')
                ->where('id',$request->idSolicitud)
                ->update([
                    'tipoVisita'    => $tipoSolicitud
                ]);
                return redirect()->action([SolicitudController::class,'solicitudesJefeDepto']);
                break;

            case 4: 
                $tipoSolicitud = "Foránea complementaria";
                DB::table('solicituds')
                ->where('id',$request->idSolicitud)
                ->update([
                    'tipoVisita'    => $tipoSolicitud
                ]);
                return redirect()->action([SolicitudController::class,'solicitudesJefeDepto']);
                break;

            case 5:
                $tipoSolicitud = "Local sin transporte";
                DB::table('solicituds')
                ->where('id',$request->idSolicitud)
                ->update([
                    'tipoVisita'    => $tipoSolicitud
                ]);
                return redirect()->action([SolicitudController::class,'solicitudesJefeDepto']);
                break;

            default:
            return redirect()->action([SolicitudController::class,'solicitudesJefeDepto']);
        }
    }

    //Funciones para el subdirector
    public function solicitudesSub(){
        $solicitudes = DB::table('solicituds')
        ->join('users','solicituds.user_id','=','users.id')
        ->join('info_instancias', 'solicituds.id', '=', 'info_instancias.solicitud_id')
        ->join('info_docentes', 'solicituds.id', '=', 'info_docentes.solicitud_id')
        ->join('info_academicas','info_academicas.solicitud_id','=','solicituds.id')
        ->where('solicituds.tipoVisita','!=',null)
        ->where('solicituds.autorizacion',2)
        ->get();

        
        
        return view('subdirector.sub_solicitudes', ['solicitudes' => $solicitudes]);
    }

    public function autorizarSolicitud(Request $request){
        $request->validate([
            'observaciones'     =>  'Nullable | string'
        ]);
        switch ($request->tipoSolicitud){
            case 1: 
                DB::table('solicituds')
                ->where('id',$request->idSolicitud)
                ->update([
                    'autorizacion'      => 1,
                    'observaciones'     => $request->observaciones
                ]);
                return redirect()->action([SolicitudController::class,'solicitudesSub']);
                break;
            case 2:
                DB::table('solicituds')
                ->where('id',$request->idSolicitud)
                ->update([
                    'autorizacion'      => 0,
                    'observaciones'     => $request->observaciones
                ]);
                return redirect()->action([SolicitudController::class,'solicitudesSub']);
                break; 
            default:
            return redirect()->action([SolicitudController::class,'solicitudesSub']);
        }
    }


    //Funciones para descargar solicitud
    public function descargarFormato(Solicitud $solicitud, $id){
        $solicitudes = $solicitud::find($id);
       
        try{
            $template = new \PhpOffice\PhpWord\TemplateProcessor('Formato-visitas.docx');
            $template->setValue('folio',$solicitudes->folio);

            
            $template->setValue('asignatura1',$solicitudes->InfoAcademica->asignatura1);
            $template->setValue('s1',$solicitudes->InfoAcademica->semestre1);
            $template->setValue('n1',$solicitudes->InfoAcademica->numAlumnos1);
            $template->setValue('asignatura2',$solicitudes->InfoAcademica->asignatura2);
            $template->setValue('s2',$solicitudes->InfoAcademica->semestre2);
            $template->setValue('n2',$solicitudes->InfoAcademica->numAlumnos2);
            $template->setValue('objetivo',$solicitudes->InfoAcademica->objetivo);

            $template->setValue('docenteRes',$solicitudes->InfoDocente->docentePrincipal);
            $template->setValue('emailRes',$solicitudes->InfoDocente->emailPrincipal);
            $template->setValue('telRes',$solicitudes->InfoDocente->telefonoPrincipal);
            $template->setValue('docenteAcom',$solicitudes->InfoDocente->docenteAcom);
            $template->setValue('emailAcom',$solicitudes->InfoDocente->emailAcom);
            $template->setValue('telAcom',$solicitudes->InfoDocente->telAcom);
            $template->setValue('docenteSupl',$solicitudes->InfoDocente->docenteSuplente);
            $template->setValue('emailSupl',$solicitudes->InfoDocente->emailSuplente);
            $template->setValue('telSupl',$solicitudes->InfoDocente->telefonoSuplente);


            $template->setValue('fechaSug',$solicitudes->InfoInstancia->fecha);

            $template->setValue('instancia',$solicitudes->InfoInstancia->instancia);
            $template->setValue('domicilio',$solicitudes->InfoInstancia->domicilio);
            $template->setValue('contacto',$solicitudes->InfoInstancia->contacto);
            $template->setValue('telContacto',$solicitudes->InfoInstancia->telefono);
            $template->setValue('entidad',$solicitudes->InfoInstancia->entidad);
            $template->setValue('puesto',$solicitudes->InfoInstancia->puesto);
            $template->setValue('email',$solicitudes->InfoInstancia->correo);
            $template->setValue('instanciaSust',$solicitudes->InfoInstancia->instanciaSustituta);
            $template->setValue('domicilioSust',$solicitudes->InfoInstancia->domicilioSustituta);
            $template->setValue('contactoSust',$solicitudes->InfoInstancia->contactoSustituta);
            $template->setValue('telSust',$solicitudes->InfoInstancia->telefonoSustituta);
            $template->setValue('entidadSust',$solicitudes->InfoInstancia->entidadSustituta);
            $template->setValue('puestoSust',$solicitudes->InfoInstancia->puestoSustituta);
            $template->setValue('emailSust',$solicitudes->InfoInstancia->correoSustituta);

            $template->setValue('tipoViaje',$solicitudes->tipoVisita);

            if($solicitudes->autorizacion == 1) $template->setValue('autorizacion', 'Si');
            else $template->setValue('autorizacion', 'No');

            $template->setValue('observaciones',$solicitudes->observaciones);


            $tempFile = tempnam(sys_get_temp_dir(), 'PHPWord');
            $template->saveAs($tempFile);

            $headers = [
                "Content-Type: application/octet-stream",
            ];

            return response()->download($tempFile,'Formato-'.$solicitudes->folio.'.docx', $headers)->deleteFileAfterSend(true);
        }catch(\PhpOffice\PhpWord\Exception\Exception $e){
            return back($e->getCode());
        }
    }

    public function descargarSolicitud(Solicitud $solicitud, $id){
        $solicitudes = $solicitud::find($id);
        $carreraNombre = Carrera::find($solicitudes->InfoAcademica->carrera_id)->carrera;
        
        try{
            $template = new \PhpOffice\PhpWord\TemplateProcessor('Solicitud-visitas.docx');
            
            Carbon::setLocale('es');
            setlocale(LC_TIME, 'es_ES.utf8');
            $template->setValue('fechaHoy', Carbon::now()->locale('es')->translatedFormat('d \d\e F \d\e\l Y'));
            $template->setValue('oficio', $solicitudes->folio);

            $template->setValue('encargado', $solicitudes->InfoInstancia->contacto);
            $template->setValue('puesto', $solicitudes->InfoInstancia->puesto);
            $template->setValue('entidad', $solicitudes->InfoInstancia->instancia);

            $template->setValue('objetivo', $solicitudes->InfoAcademica->objetivo);
            $template->setValue('carrera', $carreraNombre);
            if(is_null($solicitudes->InfoAcademica->asignatura2)) {
                $template->setValue('asignaturas', $solicitudes->InfoAcademica->asignatura1);
                $template->setValue('semestres', $solicitudes->InfoAcademica->semestre1);
            }
            else {
                $template->setValue('asignaturas', $solicitudes->InfoAcademica->asignatura1.' y '.$solicitudes->InfoAcademica->asignatura2);
                $template->setValue('semestres', $solicitudes->InfoAcademica->semestre1.' y '.$solicitudes->InfoAcademica->semestre2);

            }
            

            $template->setValue('totalAlumnos', $solicitudes->InfoAcademica->totalAlumnos);
            $template->setValue('docentePrincipal', $solicitudes->InfoDocente->docentePrincipal);
            $template->setValue('docenteAcom', $solicitudes->InfoDocente->docenteAcom);
            $template->setValue('fechaVisita', $solicitudes->InfoInstancia->fecha);
            $template->setValue('Observaciones', $solicitudes->observaciones);



            $tempFile = tempnam(sys_get_temp_dir(), 'PHPWord');
            $template->saveAs($tempFile);

            $headers = [
                "Content-Type: application/octet-stream",
            ];
            return response()->download($tempFile,'Solicitud-'.$solicitudes->folio.'.docx', $headers)->deleteFileAfterSend(true);
        }catch(\PhpOffice\PhpWord\Exception\Exception $e){
            return back($e->getCode());
        }
    }
}
