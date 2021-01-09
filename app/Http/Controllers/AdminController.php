<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Departamento;

use function Ramsey\Uuid\v1;

class AdminController extends Controller
{
    public function index(){
        return view('login');
    }
    
    public function indexAdmin(){
        return view('admin.admin_inicio');
    }


    public function indexProfesor(){
        return view('profesores.prof_index');
    }

    public function indexSubdirector(){
        return view('subdirector.sub_index');
    }

    public function indexJefeDepto(){
        return view('jefeDepto.jefe_index');
    }

    
    public function edit_users(){
        return view('admin.edicion_user');
    }


    public function solicitudes(){
        return view('admin.admin_solicitudes');
    }

    public function adminPerfil(){
        return view('admin.admin_perfil');
    }

}
