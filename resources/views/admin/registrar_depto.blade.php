@extends('admin/admin_demo')

@section('title','| Registrar departamento')

@section('content')
<div class="section section-page">
    <div class="container centrar">
        <h3 class="text mt-4">Registrar departamento.</h3>
        <form method="post" action="{{route('depto.store')}}">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="nombre">Nombre del departamento.</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="centrar col-md-12">
                    <button type="submit" class="btn">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

