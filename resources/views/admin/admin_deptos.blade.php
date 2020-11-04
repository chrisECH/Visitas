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
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <a href="{{url('admin/departamentos/editar')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="right">
                <a href="#" class="btn btn-success">Nuevo Departamento <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@endsection