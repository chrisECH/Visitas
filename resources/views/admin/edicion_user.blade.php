@extends('admin/admin_demo')

@section('title','| Editar usuario')

@section('content')
    <div class="section section-page">
        <div class="container centrar">
            <h3 class="text mt-4">Editar Usuario</h3>

            <form method="POST" action="{{route('usuarios.update')}}">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{$user->nombre}}">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellidop" id="apellidop" value="{{$user->apellidop}}">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellidom" id="apellidom" value="{{$user->apellidom}}">
                    </div>

                    <div class="col-md-2 col-sm-2"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="tel">Telefono</label>
                        <input type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{$user->telefono}}">
                    </div>

                    <div class="form-group col-md-4 col-sm-4">
                        <label for="mail">Correo institucional</label>
                        <input type="email" class="form-control @error('mail') is-invalid @enderror" id="mail" name="mail" aria-describedat="emailHelp" value="{{$user->email}}">
                    </div>
                    <div class="col-md-2 col-sm-2"></div>


                    <div class="col-md-1 col-sm-1"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" id="rol">}
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
                        <button type="submit" class="btn">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection