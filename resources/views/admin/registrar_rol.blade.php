@extends('admin/admin_demo')

@section('title','| Registrar rol')

@section('content')
<div class="section section-page">
    <div class="container centrar">
        <h3 class="text mt-4">Registrar rol</h3>
        <form method="post" action="{{route('rol.store')}}">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="nombre">Nombre del rol.</label>
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

