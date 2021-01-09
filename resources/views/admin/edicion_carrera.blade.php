@extends('admin/admin_demo')

@section('title','| Editar Carrera')

@section('content')
    <div class="section page-section">
        <div class="container centrar">
            <h3 class="text">Editar carrera</h3>
            <form method="post" action="{{route('carrera.update')}}">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{$carrera->id}}" name="id">
                    <div class="form-group col-md-3">
                        <label for="abreviatura">Nueva abreviatura de la carrera</label>
                        <input type="text" class="form-control" id="abreviatura" name="abreviatura" value="{{$carrera->abreviatura}}">
                    </div>
                    <div class="form-group col-md-9">
                        <label for="nombre">Nuevo nombre de la carrera</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$carrera->carrera}}">
                    </div>
                    <div class="centrar col-md-12">
                        <button type="submit" class="btn">Guardar <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection