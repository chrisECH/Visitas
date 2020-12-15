<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class AdminController extends Controller
{
    
    public function indexAdmin(){
        return view('admin.admin_inicio');
    }

    public function usuarios(){
        return view('admin.admin_users');
    }

    public function edit_users(){
        return view('admin.edicion_user');
    }

    public function regis_users(Request $request){
        $rols = rol::all();
        return view('admin.registrar_user',['rols'=>$rols]);
    }

    public function rol(){
        return view('admin.admin_roles');
    }

    public function departamentos(){
        return view('admin.admin_deptos');
    }

    public function carreras(){
        return view('admin.admin_carreras');
    }

    public function empresas(){
        return view('admin.admin_empresas');
    }
    
    public function solicitudes(){
        return view('admin.admin_solicitudes');
    }

    public function edit_depto(){
        return view('admin.edicion_depto');
    }

    public function edit_rol(){
        return view('admin.edicion_rol');
    }

    public function regis_rol(){
        return view ('admin.registrar_rol');
    }

   
}
