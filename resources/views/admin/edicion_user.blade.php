@extends('admin/admin_demo')

@section('title','| Editar usuario')

@section('content')
    <div class="section section-page">
        <div class="container centrar">
            <h3 class="text">Editar Usuario</h3>

            <form action="">
                <div class="row">
                    <input type="hidden" name="id" value="">
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="">
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="">
                    </div>
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" id="rol"></select>
                    </div>
                    <div class="col-md-2 col-sm-2"></div>
                    <div class="form-group col-md-4 col-sm-4">
                        <label for="depto">Departamento</label>
                        <select class="form-control" name="depto" id="depto"></select>
                    </div>
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-3"></div>
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="mail">Correo institucional</label>
                        <input type="email" class="form-control" id="mail" name="mail" aria-describedat="emailHelp" value="">
                    </div>
                    <input type="hidden" name="foto" value="no-photo">
                    <div class="centrar col-md-12">
                        <button type="submit" class="btn">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection