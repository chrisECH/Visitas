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
                            <th scope="row">{{$solicitud->autorizacion}}</th>
                            <th scope="row">{{$solicitud->docente}}</th>
                            <th scope="row">{{$solicitud->email}}</th>
                            
                            <td>
                                <a href="" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Descargar">
                                    <i class="fas fa-file-download"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection