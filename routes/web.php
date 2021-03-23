<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SolicitudController;
use App\Models\Rol;
use App\Models\User;

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



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [AdminController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('usuario.logout');


Route::get('/admin',[AdminController::class, 'indexAdmin'])->middleware('checkadmin')->name('admin.index');


Route::get('/subdirector',[AdminController::class, 'indexSubdirector'])->middleware('checksubdirector')->name('sub.index');
Route::get('/jefeDepto',[AdminController::class, 'indexJefeDepto'])->middleware('checkjefedepto')->name('jDepto.index');

Route::get('/admin/perfil/{id}',[UserController::class, 'show'])->middleware('checkadmin')->name('admin.perfil');
Route::post('/admin/perfil/',[UserController::class, 'actFoto'])->middleware('checkadmin')->name('admin.foto_perfil');


Route::get('/admin/solicitudes',[SolicitudController::class, 'allSolicitud'])->middleware('checkadmin')->name('admin.solicitudes');


Route::get('/admin/usuarios',[UserController::class,'index'])->middleware('checkadmin')->name('usuarios.index');
Route::get('/admin/usuarios/registrar',[UserController::class, 'create'])->middleware('checkadmin')->name('usuarios.crear');
//Consultas a la BD para los usuarios.
Route::post('/admin/usuarios/registrar',[UserController::class, 'store'])->middleware('checkadmin')->name('usuarios.store');
Route::get('/admin/usuarios/editar/{id}',[UserController::class, 'edit'])->middleware('checkadmin')->name('usuarios.editar');
Route::post('/actualizar_usuario',[UserController::class, 'update'])->middleware('checkadmin')->name('usuarios.update');
Route::delete('/eliminar_usuario/{id}',[UserController::class, 'destroy'])->middleware('checkadmin')->name('usuarios.eliminar');
Route::post('/admin/usuarios',[UserController::class, 'busqueda'])->middleware('checkadmin')->name('usuarios.busqueda');


Route::get('/admin/rol',[RolController::class, 'index'])->middleware('checkadmin')->name('rol.index');
Route::get('/admin/rol/registrar',[RolController::class, 'create'])->middleware('checkadmin')->name('rol.crear');
//Consultas a la BD para los roles
Route::post('/admin/rol/registrar',[RolController::class, 'store'])->middleware('checkadmin')->name('rol.store');
Route::get('/admin/rol/editar/{id}',[RolController::class, 'edit'])->middleware('checkadmin')->name('rol.editar');
Route::post('/admin/rol',[RolController::class, 'update'])->middleware('checkadmin')->name('rol.update');


Route::get('/admin/departamentos',[DepartamentoController::class, 'index'])->middleware('checkadmin')->name('depto.index');
Route::get('/admin/departamentos/registrar',[DepartamentoController::class, 'create'])->middleware('checkadmin')->name('depto.crear');
//Consultas a la BD para los departamentos
Route::post('/admin/departamentos/registrar',[DepartamentoController::class, 'store'])->middleware('checkadmin')->name('depto.store');
Route::get('/admin/departamentos/editar/{id}',[DepartamentoController::class, 'edit'])->middleware('checkadmin')->name('depto.editar');
Route::post('/admin/departamentos',[DepartamentoController::class, 'update'])->middleware('checkadmin')->name('depto.update');
Route::delete('/admin/departamentos/{id}', [DepartamentoController::class, 'destroy'])->middleware('checkadmin')->name('depto.eliminar');



Route::get('/admin/carreras',[CarreraController::class, 'index'])->middleware('checkadmin')->name('carrera.index');
Route::get('/admin/carreras/registrar',[CarreraController::class, 'create'])->middleware('checkadmin')->name('carrera.regis');
//Consutlas a la BD para las carreras
Route::post('/admin/carreras/registrar',[CarreraController::class, 'store'])->middleware('checkadmin')->name('carrera.store');
Route::get('/admin/carreras/editar/{id}',[CarreraController::class, 'edit'])->middleware('checkadmin')->name('carrera.editar');
Route::post('/admin/carreras', [CarreraController::class, 'update'])->middleware('checkadmin')->name('carrera.update');
Route::delete('/admin/carreras/{id}', [CarreraController::class, 'destroy'])->middleware('checkadmin')->name('carrera.eliminar');



Route::get('/profesor',[AdminController::class, 'indexProfesor'])->middleware('checkprof')->name('profe.index');
Route::get('/profesor/perfil/{id}', [UserController::class, 'showProfesor'])->middleware('checkprof')->name('profe.perfil');

Route::get('/profesor/crear_solicitud',[SolicitudController::class, 'create'])->middleware('checkprof')->name('profe.crear_solicitud');
Route::get('/profesor/solicitudes', [SolicitudController::class, 'show'])->middleware('checkprof')->name('profe.solicitudes');
Route::get('/profesor/status-solicitud', [SolicitudController::class, 'status'])->middleware('checkprof')->name('profe.status_solicitud');
Route::get('/pofesor/editar_solicitud/{id}', [SolicitudController::class, 'edit'])->middleware('checkprof')->name('profe.editar_solicitud');


Route::post('/profesor', [SolicitudController::class, 'store'])->middleware('checkprof')->name('profe.registrar_solicitud');
Route::delete('/cancelar_solicitud/{id}',[SolicitudController::class, 'destroy'])->middleware('checkprof')->name('profe.cancelar_solicitud');
Route::post('/actualizar_solicitud',[SolicitudController::class, 'validar'])->middleware('checkprof')->name('profe.actualizar_solicitud');