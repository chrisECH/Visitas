@extends('profesores/prof_demo')

@section('title','| Solicitudes')

@section('content')
<div class="section page-section">
    <div class="container centrar shadow admin-page">
        <div class="row user-list">
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Entidad</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <td>
                            <a href="" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar" >
                                Editar
                            </a>
                            <a class="btn btn-danger" data-toggle="modal" data-placement="top" title="Borrar" data-target="#eliminarModal">
                                Cancelar
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="eliminarModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar carrera</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    ¿Seguro que quieres cancelar la solicitud con folio<span> Folio </span> ?
                                    <br>
                                    <span>Nota: Al hacer esto no se eliminará la solicitud, solo se cancelará</span>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <form method="post" action="">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Sí</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                        </td>
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