@extends('admin/admin_demo')

@section('title','| Editar usuario')

@section('content')
    <div class="section section-page">
        <div class="container centrar">
            <h3 class="text mt-4">Editar Usuario</h3>

            <form method="POST" action="{{route('usuarios.update')}}">
                <h4 class="text mt-4">Editar información</h4>
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{$user->id}}">
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

                    <div class="col-md-4 col-sm-4"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="tel">Telefono</label>
                        <input type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{$user->telefono}}">
                        @error('telefono')
                            <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                         @enderror
                    </div>

                    <div class="form-group col-md-2 col-sm-2">

                    </div>
                    <div class="col-md-2 col-sm-2"></div>


                    <div class="col-md-1 col-sm-1"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" id="rol">
                            @foreach ($rols as $rol)
                                <option value="{{$rol->id}}"
                                    @if($rol->id == $user->rol_id)
                                    selected
                                    @endif
                                >{{$rol->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="depto">Departamento</label>
                        <select class="form-control" name="depto" id="depto">
                            @foreach ($deptos as $depto)
                                <option value="{{$depto->id}}" 
                                    @if($depto->id == $user->depto_id) 
                                    selected 
                                    @endif>
                                    {{$depto->nombre}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="centrar col-md-12">
                        <button type="submit" class="btn">Guardar información</button>
                    </div>
                </div>
            </form>

            <hr>

            <form method="POST" action="{{route('usuarios.updateMail')}}">
                @csrf
                <h4 class="text mt-4">Editar correo electrónico</h4>
                <div class="row">
                    <input type="hidden" name="id" id="id" value="{{$user->id}}">
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="mail">Correo institucional actual</label>
                        <input type="email" class="form-control @error('mail') is-invalid @enderror" id="mail" name="mail" aria-describedat="emailHelp" value="{{$user->email}}" disabled>
                    </div> 
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="correo">Nuevo correo institucional</label>
                        <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" aria-describedat="emailHelp" value="{{old('correo')}}">
                        @error('correo')
                            <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="centrar col-md-12">
                        <button type="submit" class="btn">Guardar cambios</button>
                    </div>
                </div>
                
                
            </form>
        </div>
    </div>
@endsection