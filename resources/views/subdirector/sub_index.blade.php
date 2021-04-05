@extends('subdirector/sub_demo')
@section('title')
@endsection

@section('content')
    
    <div class="section section-page">
        <div class="container centrar">
            <div class="card">
                <div class="card-header header">
                  <h4>Bienvenido de nuevo {{Auth::user()->nombre}}</h4>
                  <h6>Iniciaste sesion como subdirector.</h6>
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>Ahora podras aprobar o rechazar las solicitudes de visitas que se hayan creado.
                    </p>
                  </blockquote>
                </div>
              </div>
        </div>
    </div>
@endsection