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
        if($solicitud == null) $solicitud = $solicitud + 1;
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
           'docentePrinc'           => 'required|string',
           'emailPrinc'             => 'required|email',
           'telefonoPrinc'          => 'required|numeric',

           'docenteAcom'            => 'nullable|string',
           'emailAcom'              => 'nullable|email',
           'telefonoAcom'           => 'nullable|numeric',

           'docenteSupl'            => 'nullable|string',
           'emailSupl'              => 'nullable|email',
           'telefonoSupl'           => 'nullable|numeric',

       ],[
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

      
    
      $numVisita = $request->numVisita+1;
      $carreraAbreviado = Carrera::find($request->carrera)->abreviatura;
      if($request->numVisita < 9) $folio = $carreraAbreviado. $request->diaSolicitud.$request->mesSolicitud.$request->anioSolicitud.'0'.$numVisita.$request->tipoVisita.$request->visitasDe;
      else $folio = $carreraAbreviado. $request->diaSolicitud.$request->mesSolicitud.$request->anioSolicitud.$numVisita.$request->tipoVisita.$request->visitasDe;
      $user = Auth::user();
    
      $folioDB = DB::table('solicituds')->where('folio',$folio)->get();
      if(count($folioDB)!=0){
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
        'solicitud_id'      => $solicitudId->id
      ]);

      DB::table('info_docentes')->insert([
          'docentePrincipal'    => $request->docentePrinc,
          'emailPrincipal'      => $request->emailPrinc,
          'telefonoPrincipal'   => $request->telefonoPrinc,
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
      
      
        return redirect()->action([SolicitudController::class,'status']);
       

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
                            ->join('info_instancias','solicituds.id','=','info_instancias.solicitud_id')
                            ->where('solicituds.user_id','=',Auth::user()->id)
                            ->select('solicituds.id','solicituds.folio','solicituds.autorizacion','info_instancias.instancia as empresa',
                            'info_instancias.entidad as entidad','info_instancias.fecha as fecha')
                            ->get();

        return view('profesores.prof_solicitudes',['solicituds' => $datosSolicituds]);
    }

    public function status(){
        $statusSolicitud = DB::table('solicituds')
                            ->join('info_instancias','solicituds.id','=','info_instancias.solicitud_id')
                            ->where('solicituds.user_id','=',Auth::user()->id)
                            ->select('solicituds.id','solicituds.folio','solicituds.autorizacion','solicituds.observaciones','info_instancias.instancia as empresa',
                            'info_instancias.entidad as entidad','info_instancias.fecha as fecha')
                            ->get();
        return view('profesores.prof_status',['solicituds' => $statusSolicitud]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud,$id)
    {
        $solicitud = $solicitud::find($id);
        
        DB::table('solicituds')
        ->where('id','=',$solicitud->id)
        ->update([
            'autorizacion' => 3
        ]);

        return redirect()->action([SolicitudController::class,'show']);
    }

    //Funcion para el administrador
    public function allSolicitud(){
        $solicitudes = DB::table('solicituds')
                    ->join('info_instancias','solicituds.id','=','info_instancias.solicitud_id')
                    ->join('info_docentes','solicituds.id','=','info_docentes.solicitud_id')
                    ->select('solicituds.id','solicituds.folio','solicituds.autorizacion','info_instancias.instancia as empresa',
                    'info_docentes.docentePrincipal as docente','info_docentes.emailPrincipal as email')
                    ->get();

        
        return view('admin.admin_solicitudes', ['solicitudes' => $solicitudes]);
    }
}
