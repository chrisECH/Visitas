@extends('admin/admin_demo')

@section('title','| Administración de usuarios')

@section('content')
    <div class="section page-section">
        <div class="container centrar shadow">
            <form method="POST" action="{{route('usuarios.busqueda')}}">
                @csrf
                <div class="row bg-light">
                    <div class="col-md-6">
                        <input type="text" name="busqueda" class="form-control admin-item admin-search" placeholder="Buscar usuario">
                    </div>
                    <div class="col-md-3">
                        <select name="depto" id="" class="form-control admin-item admin-search">
                            @foreach ($deptos as $depto)
                                <option value="{{$depto->id}}">{{$depto->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-dark admin-item admin-search">
                            <strong>Buscar</strong>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="row user-list">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apell. Paterno</th>
                            <th scope="col">Apell. Materno</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            
                        
                        <tr>
                            <th scope="row">{{$user->nombre}}</th>
                            <th scope="row">{{$user->apellidop}}</th>
                            <th scope="row">{{$user->apellidom}}</th>
                            <th scope="row">{{$user->deptoNombre}}</th>
                            <th scope="row">{{$user->rolNombre}}</th>
                            <td>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Ver perfil">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('usuarios.editar',$user->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-placement="top" title="Borrar" data-target="#eliminarModal{{$user->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <div class="modal fade" id="eliminarModal{{$user->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            ¿Seguro que quieres eliminar a <span> {{ $user->nombre}}? </span>
                                            <span class="warning-user">Nota: al eliminar el usuario no se eliminaran las solicitudes que haya realizado.</span>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form method="POST" action="{{route('usuarios.eliminar',$user->id)}}">
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
                {{$users->links()}}
            </div>
            
            <div class="right" id="right">
                <a href="{{route('usuarios.crear')}}" class="btn btn-success">
                    Nuevo usuario
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
@endsection