@extends('admin/admin_demo')

@section('title','| Administación de Departamentos')

@section('content')
    <div class="section page-section">
        <div class="container centrar shadow admin-page">
            <div class="row user-list">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Abreviatura</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carreras as $carrera)
                        <tr>
                            <th scope="row">{{$carrera->abreviatura}}</th>
                            <th scope="row">{{$carrera->carrera}}</th>
                            <td>
                                <a href="{{route('carrera.editar',$carrera->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar" >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" data-toggle="modal" data-placement="top" title="Borrar" data-target="#eliminarModal{{$carrera->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="eliminarModal{{$carrera->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Eliminar carrera</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        ¿Seguro que quiere eliminar la carrera <span> {{ $carrera->carrera}}? </span>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form method="post" action="{{route('carrera.eliminar',$carrera->id)}}">
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
                <a href="{{route('carrera.regis')}}" class="btn btn-success">
                    Nueva Carrera <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@endsection