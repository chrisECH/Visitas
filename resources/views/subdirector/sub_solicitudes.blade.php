@extends('subdirector/sub_demo')
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
                                    Elija la opción para la solicitud <span> {{$solicitud->folio}} </span>
                                    <br>
                                    <form method="post" action="{{route('sub.autorizarSolicitud')}}">
                                        @csrf
                                        
                                        <input type="hidden" name="idSolicitud" name="idSolicitud" value="{{$solicitud->id}}">
                                        <select class="form-control" name="tipoSolicitud" id="tipoSolicitud">
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                        <label for="observaciones">Observaciones</label>
                                        <input type="text" name="observaciones" id="observaciones" class="form-control">
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
                   
                    @endforeach
                </tbody>
            </table>
        
        </div>
        
        
    </div>
@endsection