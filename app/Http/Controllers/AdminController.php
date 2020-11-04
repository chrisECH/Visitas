<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin/admin_inicio');
    }

    public function usuarios(){
        return view('admin/admin_users');
    }

    public function rol(){
        return view('admin/admin_roles');
    }

    public function departamentos(){
        return view('admin/admin_deptos');
    }

    public function carreras(){
        return view('admin/admin_carreras');
    }

    public function empresas(){
        return view('admin/admin_empresas');
    }
    
    public function solicitudes(){
        return view('admin/admin_solicitudes');
    }

    public function edit_depto(){
        return view('admin/edicion_depto');
    }

    public function edit_rol(){
        return view('admin/edicion_rol');
    }

    public function edit_users(){
        return view('admin/edicion_user');
    }
}
