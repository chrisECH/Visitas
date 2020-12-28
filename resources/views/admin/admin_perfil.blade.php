@extends('admin/admin_demo')

@section('title','| Perfil de')


@section('content')

    <div class="section page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 centrar">
                    <img src="{{asset('files/no-photo.png')}}" alt="foto de perfil" class="rounded-circle profile-image shadow">

                    {{-- <img src="" alt="foto de perfil" class="rounded-circle profile-image shadow"> --}}

                    <h3>Nombre apellido</h3>
                    <h5>$Rol en <span class="dept-name">Departamento</span></h5>
                </div>
                <div class="col-md-6">
                    <div class="card profile-info">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection