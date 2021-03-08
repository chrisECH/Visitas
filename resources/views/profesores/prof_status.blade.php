@extends('profesores/prof_demo')

@section('title','| Status de solicitudes')

@section('content')
    <div class="section page-section">
        <div class="container centrar shadow admin-page">
            <div class="row user-list">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Folio</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Status</th>
                            <th scope="col">Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                        </tr>
                        
                    </tbody>
                </table>
            
            </div>
            <div class="left">
                
            </div>
            <div class="right">
                <a href="" class="btn btn-success">
                    Nueva solicitud <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@endsection