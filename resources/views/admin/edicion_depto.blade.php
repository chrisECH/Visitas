@extends('admin/admin_demo')

@section('title','| Editar')

@section('content')
    <div class="section page-section">
        <div class="container centrar">
            <h3 class="text">Editar Departamento</h3>
            <form method="post" action="{{route('depto.update')}}">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{$depto->id}}" name="id">

                    <div class="form-group col-md-12">
                        <label for="nombre">Nombre de departamento</label>
                        <input type="text" class="form-control shadow" id="nombre" name="nombre" value="{{$depto->nombre}}">
                    </div>
                    <div class="centrar col-md-12">
                        <button type="submit" class="btn">Guardar <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection