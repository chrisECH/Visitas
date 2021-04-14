@extends('profesores/prof_demo')
@section('title')
@endsection

@section('content')
    
    <div class="section section-page">
        <div class="container centrar">
            <div class="card">
                <div class="card-header header">
                  <h4>Bienvenido de nuevo {{Auth::user()->nombre}} {{Auth::user()->apellidop}} {{Auth::user()->apellidom}}</h4>
                  <h6>Iniciaste sesion como profesor.</h6>
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>Ahora podrás crear solicitudes para visitar empresas, así como consultar el status de estas.
                    </p>
                  </blockquote>
                </div>
              </div>
        </div>
    </div>
@endsection