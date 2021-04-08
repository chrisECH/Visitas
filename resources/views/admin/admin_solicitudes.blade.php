@extends('admin/admin_demo')

@section('title','| Administación de Departamentos')

@section('content')
    <div class="section page-section">
        <div class="container centrar shadow admin-page">
            <div class="row user-list">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Folio</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Status</th>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Email solicitante</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $solicitud)
                        <tr>
                            <th scope="row">{{$solicitud->folio}}</th>
                            <th scope="row">{{$solicitud->empresa}}</th>
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
                            <th scope="row">{{$solicitud->docente}}</th>
                            <th scope="row">{{$solicitud->email}}</th>
                            
                            <td>
                                <a href="{{route('admin.showSolicitud',$solicitud->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($solicitud->autorizacion != 2) {{-- Si la solicitud aun esta en pendiente muestra el boton de cancelar  --}}
                                    <a></a>
                                @else
                                    <a class="btn btn-danger" data-toggle="modal" data-placement="top" title="Cancelar" data-target="#eliminarModal{{$solicitud->id}}">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                
                                @endif

                                
                                <!-- Modal para confirmar cancelar una solicitud-->
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
                                        <span>Nota: Al hacer esto no se eliminará la solicitud, solo se cancelará.</span>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <form method="post" action="{{route('admin.cancelar_solicitud',$solicitud->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Sí</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                                @if ($solicitud->autorizacion == 3) {{-- Si la solicitud esta cancelada muestra el boton de volver a activar --}}
                                <a class="btn btn-success" data-toggle="modal" data-placement="top" title="Activar" data-target="#activarModal{{$solicitud->id}}">
                                    <i class="fas fa-check"></i>
                                </a>

                                @endif


                                <!-- Modal para confirmar la activacion de una solicitud-->
                                <div class="modal fade" id="activarModal{{$solicitud->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark text-white">
                                        <h5 class="modal-title" id="staticBackdropLabel">Activar solicitud</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        ¿Seguro que quieres activar nuevamente la solicitud con folio<span> {{$solicitud->folio}} </span> ?
                                        <br>
                                        
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <form method="post" action="{{route('admin.activar_solicitud',$solicitud->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Sí</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                                @if($solicitud->autorizacion != 1) {{-- Si la solicitud es aceptada muestra los botones para descargar los archivos de esta --}}
                                    <a></a>
                                @else
                                    <a href="{{route('admin.descargar_formato',$solicitud->id)}}" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Descargar Formato">
                                        <i class="fas fa-file-download"></i>
                                    </a>
                                    <a href="{{route('admin.descargar_solicitud',$solicitud->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Descargar Solicitud">
                                        <i class="fas fa-file-download"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection