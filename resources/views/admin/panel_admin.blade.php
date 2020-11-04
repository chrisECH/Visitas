@extends('admin/admin_demo')

@section('title','| Panel de administrador.')

@section('content')
    <div class="section page-section">
        <div class="container centrar">
            <h1>Panel de Administrador.</h1>
            <div class="row">
                <div class="col-md-4 dashboard-link">
                    <a href="/admin/usuarios">
                        <div class="container shadow">
                            <i class="fas fa-users">
                                <h5>Administrar Usuarios</h5>
                            </i>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 dashboard-link">
                    <a href="{{url('/admin/rol')}}">
                        <div class="container shadow">
                            <i class="fas fa-user-plus">
                                <h5>Administrar Roles</h5>
                            </i>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 dashboard-link">
                    <a href="{{url('/admin/departamentos')}}">
                        <div class="container shadow">
                            <i class="fas fa-file-signature">
                                <h5>Administrar Departamentos</h5>
                            </i>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 dashboard-link">
                    <a href="{{url('/admin/carreras')}}">
                        <div class="container shadow">
                            <i class="fas fa-school">
                                <h5>Administrar Carreras</h5>
                            </i>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 dashboard-link">
                    <a href="{{url('/admin/empresas')}}">
                        <div class="container shadow">
                            <i class="fas fa-building">
                                <h5>Administrar Empresas</h5>
                            </i>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 dashboard-link">
                    <a href="{{url('/admin/solicitudes')}}">
                        <div class="container shadow">
                            <i class="fas fa-file-contract">
                                <h5>Administrar Solicitudes</h5>
                            </i>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection