<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Models\Rol;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [AdminController::class, 'index'])->name('login');

Route::get('/admin',[AdminController::class, 'indexAdmin'])->name('admin.index');


Route::get('/profesor',[AdminController::class, 'indexProfesor'])->name('profe.index');
Route::get('/subdirector',[AdminController::class, 'indexSubdirector'])->name('sub.index');
Route::get('/jefeDepto',[AdminController::class, 'indexJefeDepto'])->name('jDepto.index');

Route::get('/perfil',[AdminController::class, 'adminPerfil'])->name('admin.perfil');



Route::get('/admin/usuarios',[AdminController::class,'usuarios'])->name('usuarios.index');
Route::get('/admin/usuarios/registrar',[AdminController::class, 'regis_users']);
Route::get('/admin/usuarios/editar',[AdminController::class, 'edit_users']);



Route::get('/admin/rol',[RolController::class, 'index'])->name('rol.index');
Route::get('/admin/rol/registrar',[RolController::class, 'create'])->name('rol.crear');
//Consultas a la BD
Route::post('/admin/rol',[RolController::class, 'store'])->name('rol.store');
Route::get('/admin/rol/editar/{id}',[RolController::class, 'edit'])->name('rol.editar');

Route::get('/admin/departamentos',[AdminController::class, 'departamentos']);
Route::get('/admin/departamentos/editar',[AdminController::class, 'edit_depto']);
Route::get('/admin/departamentos/registrar',[AdminController::class, 'registrar_depto'])->name('admin.regis_depto');

Route::get('/admin/carreras',[AdminController::class, 'carreras']);
Route::get('/admin/empresas',[AdminController::class, 'empresas']); 
Route::get('/admin/solicitudes',[AdminController::class, 'solicitudes']); 


