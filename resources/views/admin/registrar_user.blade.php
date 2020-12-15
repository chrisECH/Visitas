@extends('admin/admin_demo')

@section('title','| Registrar usuario.')

@section('content')
    <div class="section page-section">
        <div class="container centrar ">
            <h3 class="text mb-4 mt-4">Registrar un nuevo usuario.</h3>

            <form action="">
                <div class="row">
                    <input type="hidden" name="id" value="">
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="apellido">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="">
                    </div>
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" id="rol">
                        @foreach($rols as $rol)
                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="depto">Departamento</label>
                        <select class="form-control" name="depto" id="depto"></select>
                    </div>
                   
                   
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="mail">Correo institucional</label>
                        <input type="email" class="form-control" id="mail" name="mail" aria-describedat="emailHelp" value="">
                    </div>

                    <div class="form-group col-md-4 col-sm-4">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group col-md-4 col-sm-4">
                        <label for="pass">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password_check" name="password_check" >
                    </div>
                    <input type="hidden" name="foto" value="no-photo">
                    <div class="centrar col-md-12">
                        <button type="submit" class="btn mb-5">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection