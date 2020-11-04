@extends('admin/admin_demo')

@section('title','| Administación de Departamentos')

@section('content')
    <div class="section page-section">
        <div class="container centrar shadow admin-page">
            <div class="row user-list">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Solicitud</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Estado</th>
                            <th scope="row">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <td>
                                <a href="" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Descargar">
                                    <i class="fas fa-file-download"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="right">
                <a href="#" class="btn btn-success">Nueva Carrera <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@endsection