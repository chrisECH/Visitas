@extends('jefeDepto/jefe_demo')
@section('title','| Solicitudes')

@section('content')
<div class="section page-section">
    <div class="container centrar shadow admin-page">
        <div class="row user-list">
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Solicitante</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                        
                    @if(is_null($solicitud->tipoVisita))
                    <tr>
                        <th scope="row">{{$solicitud->folio}}</th>
                        <th scope="row">{{$solicitud->instancia}}</th>
                        <th scope='row'>{{$solicitud->entidad}}</th>
                        <th scope="row">{{$solicitud->fecha}}</th>
                        <th scope="row">{{$solicitud->docentePrincipal}}</th>
                        <td>
                            
                            <a class="btn btn-success" data-toggle="modal" data-placement="top" title="Borrar" data-target="#eliminarModal{{$solicitud->id}}">
                                Completar solicitud
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="eliminarModal{{$solicitud->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title" id="staticBackdropLabel">Completar solicitud</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Elige el tipo de viaje para la solicitud <span> {{$solicitud->folio}} </span>
                                    <br>
                                    <form method="post" action="{{route('jDepto.completarSolicitud')}}">
                                        @csrf
                                        
                                        <input type="hidden" name="idSolicitud" name="idSolicitud" value="{{$solicitud->id}}">
                                        <select class="form-control" name="tipoSolicitud" id="tipoSolicitud">
                                            <option value="1">Foránea institucional</option>
                                            <option value="2">Foránea autogenerada</option>
                                            <option value="3">Local con transporte</option>
                                            <option value="4">Foránea complementaria</option>
                                            <option value="5">Local sin transporte</option>
                                        </select>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        
        </div>
        <div class="left">
            
        </div>
        
    </div>
@endsection