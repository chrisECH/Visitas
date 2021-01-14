@extends('admin/admin_demo')
@foreach ($users as $user)
@section('title','| Perfil de '.$user->nombre)


@section('content')

    <div class="section page-section">
        <form method="POST" action="{{route('admin.foto_perfil')}}" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6 centrar">
                        @if($user->foto == null)
                            <img src="{{asset('files/no-photo.png')}}" alt="foto de perfil" class="rounded-circle profile-image shadow">
                        @else
                            <img src="{{asset('profile-images/'.$user->foto)}}" alt="foto de perfil" class="rounded-circle profile-image shadow">
                        @endif
                        {{-- <img src="" alt="foto de perfil" class="rounded-circle profile-image shadow"> --}}
                        <br>
                        <br>
                        <input type="file" title="Cambiar foto perfil" name="fotoPerfil">
                        <br>
                        <h3>{{$user->nombre}} {{$user->apellidop}} {{$user->apellidom}}</h3>
                        <h5><span class="dept-name">{{$user->deptoNombre}}</span></h5>
                        <button type="submit" class="btn btn-success btn-settings">Guardar Foto
                            <i class="fas fa-save"></i>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <div class="card profile-info">
                            <div class="card-body">
                                <h5 class="card-title">Acerca de mi:</h5>
                                <div class="dropdown-divider"></div>
                                <p>Telefono: <span>{{$user->telefono}}</span></p>
                                <p>Email: <span>{{$user->email}}</span></p>
                                <p>Departamento: <span>{{$user->deptoNombre}}</span></p>
                                <p>Rol: <span>{{$user->rolNombre}}</span></p>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
         </form>
    </div>
    
@endsection
@endforeach