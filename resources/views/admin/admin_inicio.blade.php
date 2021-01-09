@extends('admin/admin_demo')
@section('title')
@endsection

@section('content')
    
    <div class="section section-page">
        <div class="container centrar">
            <div class="card">
                <div class="card-header header">
                  <h4>Bienvenido de nuevo {{auth()->user()->nombre}} {{auth()->user()->apellidop}} {{auth()->user()->apellidom}}</h4>
                  
                  <h6>Iniciaste sesion como coordinador.</h6>
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>Ahora podrás administrar los registros de los usuarios, las estadisticas, las carreras
                        los departamentos del Tecnológico y las solicitudes así como los archivos que se crean.
                    </p>
                  </blockquote>
                </div>
              </div>
        </div>
    </div>
@endsection