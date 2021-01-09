@extends('admin/admin_demo')

@section('title','| Registrar usuario.')

@section('content')
    <div class="section page-section">
        <div class="container-md container-xs centrar">
            <h3 class="text mb-4 mt-4">Registrar un nuevo usuario.</h3>

            <form method="post" action="{{route('usuarios.store')}}">
                @csrf
                <div class="row">
                        <input type="hidden" name="id" value="">
                        <div class="form-group col-md-4 col-sm-4">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Apellido Paterno</label>
                        <input type="text" class="form-control @error('apellidop') is-invalid @enderror" name="apellidop" id="apellidop" value="{{old('apellidop')}}">
                        @error('apellidop')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Apellido Materno</label>
                        <input type="text" class="form-control @error('apellidom') is-invalid @enderror" name="apellidom" id="apellidom" value="{{old('apellidom')}}">
                        @error('apellidom')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-2 col-sm-2"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Telefono</label>
                        <input type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{old('telefono')}}">
                        @error('telefono')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 col-sm-4">
                        <label for="mail">Correo institucional</label>
                        <input type="email" class="form-control @error('mail') is-invalid @enderror" id="mail" name="mail" aria-describedat="emailHelp" value="{{old('mail')}}">
                        @error('mail')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-2 col-sm-2"></div>
                    
                    <div class="col-md-2 col-sm-2"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="pass">Confirmar contraseña</label>
                        <input type="password" class="form-control @error('password_check') is-invalid @enderror" id="password_check" name="password_check" >
                        @error('password_check')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-2 col-sm-2"></div>

                    <div class="col-md-2 col-sm-2"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" id="rol">
                        @foreach($rols as $rol)
                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="depto">Departamento</label>
                        <select class="form-control" name="depto" id="depto">
                        @foreach($depto as $depto)
                            <option value="{{$depto->id}}">{{$depto->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2"></div>
                    
                    
                    
                    <div class="centrar col-md-12">
                        <button type="submit" class="btn mb-5">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection