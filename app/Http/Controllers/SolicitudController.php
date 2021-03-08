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
        $solicitud = $solicitud + 1;
        
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
      
      dd();
       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        return view('profesores.prof_solicitudes');
    }

    public function status(){
        return view('profesores.prof_status');
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
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
