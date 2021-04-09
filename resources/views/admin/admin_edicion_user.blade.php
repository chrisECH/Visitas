@extends('admin/admin_demo')

@section('title','| Editar usuario')

@section('content')
    <div class="section section-page">
        <div class="container centrar">
            <h3 class="text mt-4">Editar Usuario</h3>

            <form method="POST" action="{{route('actualizarInfo')}}">
                
                <h4 class="text mt-4">Editar información</h4>
                @csrf
                <div class="row">
                    

                    <div class="form-group col-md-4 col-sm-4">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{$user->nombre}}">
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Apellido Paterno</label>
                        <input type="text" class="form-control  @error('apellidop') is-invalid @enderror" name="apellidop" id="apellidop" value="{{$user->apellidop}}">
                        @error('apellidop')
                            <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Apellido Materno</label>
                        <input type="text" class="form-control  @error('apellidon') is-invalid @enderror" name="apellidom" id="apellidom" value="{{$user->apellidom}}">
                        @error('apellidom')
                            <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                         @enderror
                    </div>

                    <div class="form-group col-md-4 col-sm-4">
                        <label for="tel">Telefono</label>
                        <input type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{$user->telefono}}">
                        @error('telefono')
                            <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                         @enderror
                    </div>

                    <div class="form-group col-md-4 col-sm-4">
                        <label for="rol">Rol</label>
                        <input type="text" class="form-control" name="rol" id="rol" value="{{$user->rol->nombre}}" disabled>
                        
                    </div>
                    
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="depto">Departamento</label>
                        <input type="text" class="form-control" name="rol" id="rol" value="{{$user->departamento->nombre}}" disabled>
                    </div>

                    <div class="centrar col-md-12">
                        <button type="submit" class="btn">Guardar información</button>
                    </div>
                </div>
            </form>

            <hr>

            <form method="POST" action="{{route('actualizarContraseña')}}">
                @csrf
                <h4 class="text mt-4">Cambiar contraseña</h4>
                <div class="row">
                    <input type="hidden" name="id" id="id" value="{{$user->id}}">

                    <div class="form-group col-md-6 col-sm-6">
                        <label for="password">Nueva contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                         @enderror
                    </div> 
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="password_check">Confirme contraseña</label>
                        <input type="password" class="form-control @error('password_check') is-invalid @enderror" id="password_check" name="password_check">
                        @error('password_check')
                            <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="centrar col-md-12">
                        <button type="submit" class="btn">Guardar contraseña</button>
                    </div>
                </div> 
                
            </form>
        </div>
    </div>
@endsection