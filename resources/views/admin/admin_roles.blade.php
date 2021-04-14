@extends('admin/admin_demo')

@section('title','| Administración de roles')

@section('content')
    <div class="section page-section">
        <div class="container centrar shadow admin-page">
            <div class="row user-list">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                        <tr>
                            <th scope="row">{{$rol->nombre}}</th>
                            <td>
                                <a href="{{route('rol.editar',$rol->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                               {{--  <a href="{{url('admini/rol/eliminar',$rol->id)}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                    <i class="fas fa-trash-alt"></i>
                                </a> --}}
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="right">
                <a href="{{route('rol.crear')}}" class="btn btn-success">Nuevo Rol <i class="fas fa-plus"></i></a>
            </div> --}}
        </div>
    </div>
@endsection