@extends('profesores/prof_demo')

@section('title','| Registro de solicitud')
<link rel="stylesheet" href="{{asset('css/style_solicitud.css')}}">

@section('content')
<div class="section page-section">
    <div class="container-md container-xs centrar">
        <div class="card shadow">
            <div class="card-header text-white bg-dark">
                <h5>Crear solicitud.</h5>
            </div>
            <div class="card-body df">
                
                <form method="POST" action="{{route('profe.registrar_solicitud')}}" id="form-solicitud">
                    @csrf
                    <div class="form-section">
                        <h3>Información academica</h3>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <label for="folio">Folio</label>
                            <div class="form-group col-md-2 col-sm-2">
                                <select class="form-control" name="carrera" id="carrera">
                                    @foreach ($carreras as $carrera)
                                        <option value="{{$carrera->id}}">
                                            {{$carrera->abreviatura}} <span>({{$carrera->carrera}})</span>
                                        </option>
                                    @endforeach
                                </select>
                                <label for="carrera">Carrera</label>
                            </div>

                            <div class="form-group col-md-1">
                                <input type="text" class="form-control @error('diaSolicitud') is-invalid @enderror" name="diaSolicitud" id="diaSolicitud" value="{{old('diaSolicitud')}}">
                                <label for="dia">Día <span>(DD)</span></label>
                                @error('diaSolicitud')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-1 col-sm-1">
                                <select class="form-control" name="mesSolicitud" id="mesSolicitud">
                                    <option value="" selected disabled hidden>-</option>
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                                <label for="mesSolicitud">Mes</label>
                            </div>

                            <div class="form-group col-md-1">
                                <input type="text" class="form-control @error('anioSolicitud') is-invalid @enderror" name="anioSolicitud" id="anioSolicitud" value="{{old('anioSolicitud')}}">
                                <label for="anio">Año <span>(YYYY)</span></label>
                                @error('anioSolicitud')
                                  <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-1">
                                <input type="text" class="form-control @error('numVisita') is-invalid @enderror" name="numVisita" id="numVisita" value="{{$solicitud}}" disabled>
                                <label for="numVisita">#V</label>
                                @error('numVisita')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-1 col-sm-1">
                                <select class="form-control" name="tipoVisita" id="tipoVisita">
                                    <option value="" selected disabled hidden>-</option>
                                    <option value="L">
                                        L
                                    </option>
                                    <option value="F">
                                        F
                                   </option>
                                   
                                </select>
                                <label for="tipoVisita">L/F</label>
                            </div>

                     
                            <div class="form-group col-md-1">
                                <input type="text" class="form-control @error('visitasDe') is-invalid @enderror" name="visitasDe" id="visitasDe" value="{{old('visitasDe')}}">
                                <label for="numVisita">#D#</label>
                                @error('visitasDe')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <hr>
                            
                            <div class="form-group col-md-7 col-sm-7">
                                <label for="asignatura1">Asignatura 1</label>
                                <input type="text" class="form-control @error('asignatura1') is-invalid @enderror" name="asignatura1" id="asignatura1" value="{{old('asignatura1')}}">
                                @error('asignatura1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-2 col-sm-2">
                                <label for="semestre1">Semestre</label>
                                <input type="number" class="form-control @error('semestre1') is-invalid @enderror" name="semestre1" id="semestre1" value="{{old('semestre1')}}">
                                @error('semestre1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 col-sm-3">
                                <label for="numAlumnos1">No. Alumnos</label>
                                <input type="number" class="form-control @error('numAlumnos1') is-invalid @enderror" name="numAlumnos1" id="numAlumnos1" value="{{old('numAlumnos1')}}">
                                @error('numAlumnos1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            
                            <hr>
                            <span class="opcional col-md-12 col-sm-6 mb-3">Opcional</span>
                            
                            <div class="form-group col-md-7 col-sm-7">
                                <label for="asignatura2">Asignatura 2</label>
                                <input type="text" class="form-control @error('asignatura2') is-invalid @enderror" name="asignatura2" id="asignatura2" value="{{old('asignatura2')}}">
                                @error('asignatura2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-2 col-sm-2">
                                <label for="semestre2">Semestre</label>
                                <input type="number" class="form-control @error('semestre2') is-invalid @enderror" name="semestre2" id="semestre2" value="{{old('semestre2')}}">
                                @error('semestre2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 col-sm-3">
                                <label for="numAlumnos2">No. Alumnos</label>
                                <input type="number" class="form-control @error('numAlumnos2') is-invalid @enderror" name="numAlumnos2" id="numAlumnos2" value="{{old('numAlumnos2')}}">
                                @error('numAlumnos2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                           
                            <div class="form-group col-md-4 col-sm-4">
                                <label for="totalAlumn">Total de alumnos</label>
                                <input type="number" class="form-control" name="totalAlumn @error('totalAlumn') is-invalid @enderror" id="totalAlumn" >
                                @error('totalAlumn')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-8 col-sm-8">
                                <label for="objetivo">Objetivo</label>
                                <input type="text" class="form-control @error('objetivo') is-invalid @enderror" name="objetivo" id="objetivo" value="{{old('objetivo')}}">
                                @error('objetivo')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-section">
                        <h3>Información docente.</h3>
                        <div class="row">  
                            
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="docentePrinc">Docente responsable</label>
                                <input type="text" class="form-control @error('docentePrinc') is-invalid @enderror" name="docentePrinc" id="docentePrinc" value="{{old('docentePrinc')}}">
                                @error('docentePrinc')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="emailPrinc">Correo electronico</label>
                                <input type="email" class="form-control @error('emailPrinc') is-invalid @enderror" name="emailPrinc" id="emailPrinc" value="{{old('emailPrinc')}}">
                                @error('emailPrinc')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefonoPrinc">Telefono</label>
                                <input type="text" class="form-control @error('telefonoPrinc') is-invalid @enderror" name="telefonoPrinc" id="telefonoPrinc" value="{{old('telefonoPrinc')}}">
                                @error('telefonoPrinc')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                            <span class="opcional col-md-12 col-sm-6 mb-3">Docente acompañante (Opcional)</span>

                            
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="docenteAcom">Docente Acompañante</label>
                                <input type="text" class="form-control @error('docenteAcom') is-invalid @enderror" name="docenteAcom" id="docenteAcom" value="{{old('docenteAcom')}}" >
                                @error('docenteAcom')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="emailAcom">Correo electronico</label>
                                <input type="email" class="form-control @error('emailAcom') is-invalid @enderror" name="emailAcom" id="emailAcom" value="{{old('emailAcom')}}">
                                @error('emailAcom')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefonoAcom">Telefono</label>
                                <input type="text" class="form-control @error('telefonoAcom') is-invalid @enderror" name="telefonoAcom" id="telefonoAcom" value="{{old('telefonoAcom')}}">
                                @error('telefonoAcom')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>

                            <span class="opcional col-md-12 col-sm-6 mb-3">Docente suplente (Opcional)</span>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="docenteSupl">Docente responsable</label>
                                <input type="text" class="form-control @error('docenteSupl') is-invalid @enderror" name="docenteSupl" id="docenteSupl" value="{{old('docenteSupl')}}">
                                @error('docenteSupl')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="emailSupl">Correo electronico</label>
                                <input type="email" class="form-control @error('emailSupl') is-invalid @enderror" name="emailSupl" id="emailSupl" value="{{old('emailSupl')}}">
                                @error('emailSupl')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefonoSupl">Telefono</label>
                                <input type="text" class="form-control @error('telefonoSupl') is-invalid @enderror" name="telefonoSupl" id="telefonoSupl" value="{{old('telefonoSupl')}}">
                                @error('telefonoSupl')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3>Información de la instancia a visitar</h3>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Fecha sugerida</label>
                                <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fecha" value="{{old('fecha')}}">
                                @error('fecha')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1"></div>
                            <div class="form-group col-md-3">
                                <label for="hora">Hora sugerida</label>
                                <input type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" id="hora" value="{{old('hora')}}">
                                @error('hora')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1"></div>

                            <div class="form-group col-md-4">
                                <label for="instancia">Instancia a visitar</label>
                                <input type="text" class="form-control @error('instancia') is-invalid @enderror" name="instancia" id="instancia" value="{{old('instancia')}}">
                                @error('instancia')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="entidad">Entidad Federativa</label>
                                <input type="text" class="form-control @error('entidad') is-invalid @enderror" name="entidad" id="entidad" value="{{old('entidad')}}">
                                @error('entidad')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="domicilio">Domicilio <span>(Opcional)</span></label>
                                <input type="text" class="form-control @error('domicilio') is-invalid @enderror" name="domicilio" id="domicilio" value="{{old('domicilio')}}">
                                @error('domicilio')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="contacto"> Contacto <span>(Opcional)</span></label>
                                <input type="text" class="form-control @error('contacto') is-invalid @enderror" name="contacto" id="contacto" value="{{old('contacto')}}">
                                @error('contacto')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="puesto">Puesto <span>(Opcional)</span></label>
                                <input type="text" class="form-control @error('puesto') is-invalid @enderror" name="puesto" id="puesto" value="{{old('puesto')}}">
                                @error('puesto')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="telContacto">Telefono <span>(Opcional)</span></label>
                                <input type="text" class="form-control @error('telContacto') is-invalid @enderror" name="telContacto" id="telContacto" value="{{old('telContacto')}}">
                                @error('telContacto')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="emailContacto">Correo <span>(Opcional)</span></label>
                                <input type="email" class="form-control @error('emailContacto') is-invalid @enderror" name="emailContacto" id="emailContacto" value="{{old('emailContacto')}}">
                                @error('emailContacto')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <hr>
                            <span class="opcional col-md-12 col-sm-6 mb-3">Instancia sustituta (Opcional)</span>

                            <div class="form-group col-md-4">
                                <label for="instanciaSust">Instancia sustituta</label>
                                <input type="text" class="form-control @error('instanciaSust') is-invalid @enderror" name="instanciaSust" id="instanciaSust" value="{{old('instanciaSust')}}">
                                @error('instanciaSust')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="entidadSust">Entidad Federativa</label>
                                <input type="text" class="form-control @error('entidadSust') is-invalid @enderror" name="entidadSust" id="entidadSust" value="{{old('entidadSust')}}">
                                @error('entidadSust')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="domicilioSust">Domicilio <span>(Opcional)</span></label>
                                <input type="text" class="form-control @error('domicilioSust') is-invalid @enderror" name="domicilioSust" id="domicilioSust" value="{{old('domicilioSust')}}">
                                @error('domicilioSust')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="contactoSust"> Contacto <span>(Opcional)</span></label>
                                <input type="text" class="form-control @error('contactoSust') is-invalid @enderror" name="contactoSust" id="contactoSust" value="{{old('contactoSust')}}">
                                @error('contactoSust')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="puestoSust">Puesto <span>(Opcional)</span></label>
                                <input type="text" class="form-control @error('puestoSust') is-invalid @enderror" name="puestoSust" id="puestoSust" value="{{old('puestoSust')}}">
                                @error('puestoSust')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="telContactoSust">Telefono <span>(Opcional)</span></label>
                                <input type="text" class="form-control @error('telContactoSust') is-invalid @enderror" name="telContactoSust" id="telContactoSust" value="{{old('telContactoSust')}}" >
                                @error('telContactoSust')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="emailContactoSust">Correo <span>(Opcional)</span></label>
                                <input type="email" class="form-control @error('emailContactoSust') is-invalid @enderror" name="emailContactoSust" id="emailContactoSust" value="{{old('emailContactoSust')}}">
                                @error('emailContactoSust')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="centrar col-md-12">
                        <div class="form-navigation mb-3">
                            <button type="button" class="btn btn-anterior" id="anterior" onclick="sigForm(-1)">Anterior</button>
                            <button type="submit" class="btn registro" id="registrar">Registrar</button>
                            <button type="button" class="btn btn-siguiente" id="siguiente" onclick="sigForm(1)">Siguiente</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/checkbox.js')}}"></script>
<script src="{{asset('js/multi-form.js')}}"></script>
@endsection
