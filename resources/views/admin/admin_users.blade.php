@extends('admin/admin_demo')

@section('title','| Administración de usuarios')

@section('content')
    <div class="section page-section">
        <div class="container centrar shadow">
            <form action="">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <input type="text" name="busqueda" class="form-control admin-item admin-search" placeholder="Buscar usuario">
                    </div>
                    <div class="col-md-3">
                        <select name="depto" id="" class="form-control admin-item admin-search">
                            <option value=""></option>
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
                            <th scope="col">Departamento</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <td>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Ver perfil">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="{{url('admin/usuarios/editar')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="right" id="right">
                <a href="{{url ('admin/usuarios/registrar')}}" class="btn btn-success">
                    Nuevo usuario
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
@endsection