@extends('admin/admin_demo')

@section('title','| Registrar carrera')

@section('content')
<div class="section section-page">
    <div class="container centrar">
        <h3 class="text mt-4">Registrar carrera.</h3>
        <form method="post" action="{{route('carrera.store')}}">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="abreviatura">Abreviatura de la carrera.</label>
                    <input type="text" class="form-control text-uppercase" name="abreviatura" id="abreviatura" value="{{old('abreviatura')}}">
                    @error('abreviatura')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                    @enderror
                    
                </div>
                <div class="form-group col-md-9">
                    <label for="carrera">Nombre de la carrera.</label>
                    <input type="text" class="form-control" name="carrera" id="carrera" value="{{old('carrera')}}">
                    @error('carrera')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                    @enderror
                </div>
                <div class="centrar col-md-12">
                    <button type="submit" class="btn">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection