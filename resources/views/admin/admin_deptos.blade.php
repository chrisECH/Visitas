@extends('admin/admin_demo')

@section('title','| Administación de Departamentos')

@section('content')
    <div class="section page-section">
        <div class="container centrar shadow admin-page">
            <div class="row user-list">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Departamento</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deptos as $depto)
                        <tr>
                            <th scope="row">{{$depto->nombre}}</th>
                            <td>
                                <a href="{{route('depto.editar',$depto->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger" data-toggle="modal" data-placement="top" title="Borrar" data-target="#eliminarModal{{$depto->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="eliminarModal{{$depto->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Eliminar carrera</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        ¿Seguro que quieres eliminar a <span> {{ $depto->nombre}}? </span>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form method="post" action="{{route('depto.eliminar',$depto->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
            <div class="right">
                <a href="{{route('depto.crear')}}" class="btn btn-success">Nuevo Departamento <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@endsection