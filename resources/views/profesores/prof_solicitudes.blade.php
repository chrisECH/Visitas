@extends('profesores/prof_demo')

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
                            <th scope="col">Entidad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Status</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicituds as $solicitud)
                            
                    
                        <tr>
                            <th scope="row">{{$solicitud->folio}}</th>
                            <th scope="row">{{$solicitud->empresa}}</th>
                            <th scope="row">{{$solicitud->entidad}}</th>
                            <th scope="row">{{$solicitud->fecha}}</th>
                            <th scope="row">
                                @switch($solicitud->autorizacion)
                                @case(0)
                                    No autorizado
                                    @break
                                @case(1)
                                    Autorizado
                                    @break
                                @case(2)
                                    Pendiente
                                    @break

                                @case(3)
                                    Cancelada
                                    @break
                                @default
                                    
                            @endswitch
                            </th>
                            <td>
                                @if($solicitud->autorizacion == 3 || $solicitud->autorizacion == 0 || $solicitud->autorizacion == 1)
                                   
                                    @else
                                    <a href="{{route('profe.editar_solicitud',$solicitud->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                        Editar
                                    </a>
                                @endif
                                <a class="btn btn-danger" data-toggle="modal" data-placement="top" title="Borrar" data-target="#eliminarModal{{$solicitud->id}}">
                                    Cancelar
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="eliminarModal{{$solicitud->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark text-white">
                                        <h5 class="modal-title" id="staticBackdropLabel">Cancelar solicitud</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        ¿Seguro que quieres cancelar la solicitud con folio<span> {{$solicitud->folio}} </span> ?
                                        <br>
                                        <span>Nota: Al hacer esto no se eliminará la solicitud, solo se cancelará. No podras volver a activarla.</span>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <form method="post" action="{{route('profe.cancelar_solicitud',$solicitud->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Sí</button>
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
            <div class="left">
                
            </div>
            <div class="right">
                <a href="" class="btn btn-success">
                    Nueva solicitud <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@endsection