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

//Rutas globales
Route::get('/', [AdminController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('usuario.logout');

Route::post('/actualizar_datos',[UserController::class, 'updatePassword'])->middleware('session')->name('actualizarContraseña');
Route::post('/actualizar_password',[UserController::class, 'updateInfo'])->middleware('session')->name('actualizarInfo');

//Rutas pora el administraor
Route::get('/admin',[AdminController::class, 'indexAdmin'])->middleware('checkadmin')->name('admin.index');

//Administrador: perfil
Route::get('/admin/perfil/{id}',[UserController::class, 'show'])->middleware('checkadmin')->name('admin.perfil');
Route::post('/admin/perfil/',[UserController::class, 'actFoto'])->middleware('checkadmin')->name('admin.foto_perfil');
Route::get('/admin/editar_perfil/{id}',[UserController::class, 'edit'])->middleware('checkadmin')->name('admin.editarPerfil');
//Administrador: solicitudes
Route::get('/admin/solicitudes',[SolicitudController::class, 'allSolicitud'])->middleware('checkadmin')->name('admin.solicitudes');
Route::get('/admin/editar_solicitud/{id}',[SolicitudController::class, 'edit'])->middleware('checkadmin')->name('admin.showSolicitud');
Route::get('/admin/solicitudes/descargar_formato/{id}',[SolicitudController::class, 'descargarFormato'])->middleware('checkadmin')->name('admin.descargar_formato');
Route::get('/admin/solicitudes/descargar_solicitud/{id}',[SolicitudController::class, 'descargarSolicitud'])->middleware('checkadmin')->name('admin.descargar_solicitud');
//Consultas a la BD para las solicitudes
Route::delete('/admin/cancelar_solicitud/{id}',[SolicitudController::class, 'destroy'])->middleware('checkadmin')->name('admin.cancelar_solicitud');
Route::post('/admin/activar_solicitud/{id}',[SolicitudController::class, 'activarSolicitud'])->middleware('checkadmin')->name('admin.activar_solicitud');
Route::post('/admin/solicitudes',[SolicitudController::class, 'update'])->middleware('checkadmin')->name('admin.actualizar_solicitud');



//Administrador: usuarios
Route::get('/admin/usuarios',[UserController::class,'index'])->middleware('checkadmin')->name('usuarios.index');
Route::get('/admin/usuarios/registrar',[UserController::class, 'create'])->middleware('checkadmin')->name('usuarios.crear');
Route::get('/admin/ver_usuario/{id}',[UserController::class, 'showUser'])->middleware('checkadmin')->name('admin.verUsuario');
//Consultas a la BD para los usuarios.
Route::post('/admin/usuarios/registrar',[UserController::class, 'store'])->middleware('checkadmin')->name('usuarios.store');
Route::get('/admin/usuarios/editar/{id}',[UserController::class, 'editUsers'])->middleware('checkadmin')->name('usuarios.editar');
Route::post('/actualizar_usuario',[UserController::class, 'update'])->middleware('checkadmin')->name('usuarios.update');
Route::post('/actualizar_mail',[UserController::class, 'updateMail'])->middleware('checkadmin')->name('usuarios.updateMail');
Route::delete('/eliminar_usuario/{id}',[UserController::class, 'destroy'])->middleware('checkadmin')->name('usuarios.eliminar');
Route::post('/admin/usuarios',[UserController::class, 'busqueda'])->middleware('checkadmin')->name('usuarios.busqueda');

//Administrador: Roles
Route::get('/admin/rol',[RolController::class, 'index'])->middleware('checkadmin')->name('rol.index');
Route::get('/admin/rol/registrar',[RolController::class, 'create'])->middleware('checkadmin')->name('rol.crear');
//Consultas a la BD para los roles
Route::post('/admin/rol/registrar',[RolController::class, 'store'])->middleware('checkadmin')->name('rol.store');
Route::get('/admin/rol/editar/{id}',[RolController::class, 'edit'])->middleware('checkadmin')->name('rol.editar');
Route::post('/admin/rol',[RolController::class, 'update'])->middleware('checkadmin')->name('rol.update');

//Administrador: departamentos
Route::get('/admin/departamentos',[DepartamentoController::class, 'index'])->middleware('checkadmin')->name('depto.index');
Route::get('/admin/departamentos/registrar',[DepartamentoController::class, 'create'])->middleware('checkadmin')->name('depto.crear');
//Consultas a la BD para los departamentos
Route::post('/admin/departamentos/registrar',[DepartamentoController::class, 'store'])->middleware('checkadmin')->name('depto.store');
Route::get('/admin/departamentos/editar/{id}',[DepartamentoController::class, 'edit'])->middleware('checkadmin')->name('depto.editar');
Route::post('/admin/departamentos',[DepartamentoController::class, 'update'])->middleware('checkadmin')->name('depto.update');
Route::delete('/admin/departamentos/{id}', [DepartamentoController::class, 'destroy'])->middleware('checkadmin')->name('depto.eliminar');


//Administrador: carreras
Route::get('/admin/carreras',[CarreraController::class, 'index'])->middleware('checkadmin')->name('carrera.index');
Route::get('/admin/carreras/registrar',[CarreraController::class, 'create'])->middleware('checkadmin')->name('carrera.regis');
//Consutlas a la BD para las carreras
Route::post('/admin/carreras/registrar',[CarreraController::class, 'store'])->middleware('checkadmin')->name('carrera.store');
Route::get('/admin/carreras/editar/{id}',[CarreraController::class, 'edit'])->middleware('checkadmin')->name('carrera.editar');
Route::post('/admin/carreras', [CarreraController::class, 'update'])->middleware('checkadmin')->name('carrera.update');
Route::delete('/admin/carreras/{id}', [CarreraController::class, 'destroy'])->middleware('checkadmin')->name('carrera.eliminar');



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Rutas para los profesores

//Profesor: global
Route::get('/profesor',[AdminController::class, 'indexProfesor'])->middleware('checkprof')->name('profe.index');
Route::get('/profesor/perfil/{id}', [UserController::class, 'showProfesor'])->middleware('checkprof')->name('profe.perfil');
Route::get('/profesor/editar_perfil/{id}',[UserController::class, 'edit'])->middleware('checkprof')->name('profe.editarPerfil');
//Profesor: solicitudes
Route::get('/profesor/crear_solicitud',[SolicitudController::class, 'create'])->middleware('checkprof')->name('profe.crear_solicitud');
Route::get('/profesor/solicitudes', [SolicitudController::class, 'show'])->middleware('checkprof')->name('profe.solicitudes');
Route::get('/profesor/status-solicitud', [SolicitudController::class, 'status'])->middleware('checkprof')->name('profe.status_solicitud');
Route::get('/pofesor/editar_solicitud/{id}', [SolicitudController::class, 'edit'])->middleware('checkprof')->name('profe.editar_solicitud');
Route::get('/profesor/solicitudes/descargar_formato/{id}',[SolicitudController::class, 'descargarFormato'])->middleware('checkprof')->name('profe.descargar_formato');
Route::get('/profesor/solicitudes/descargar_solicitud/{id}',[SolicitudController::class, 'descargarSolicitud'])->middleware('checkprof')->name('profe.descargar_solicitud');
//Consutlas a la BD para las solicitudes
Route::post('/profesor', [SolicitudController::class, 'store'])->middleware('checkprof')->name('profe.registrar_solicitud');
Route::delete('/cancelar_solicitud/{id}',[SolicitudController::class, 'destroy'])->middleware('checkprof')->name('profe.cancelar_solicitud');
Route::post('/profesor/solicitudes',[SolicitudController::class, 'update'])->middleware('checkprof')->name('profe.actualizar_solicitud');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Rutas para los jefes de departamentos
//jefeDepto: global
Route::get('/jefeDepto',[AdminController::class, 'indexJefeDepto'])->middleware('checkjefedepto')->name('jDepto.index');
Route::get('/jefeDepto/perfil/{id}', [UserController::class, 'showJefeDepto'])->middleware('checkjefedepto')->name('jDepto.perfil');
Route::get('/jefeDepto/editar_perfil/{id}',[UserController::class, 'edit'])->middleware('checkjefedepto')->name('jDepto.editarPerfil');
//jefeDepto: solicitudes
Route::get('/jefeDepto/solicitudes',[SolicitudController::class, 'solicitudesJefeDepto'])->middleware('checkjefedepto')->name('jDepto.solicitudes');
Route::post('/jefeDepto',[SolicitudController::class, 'completarSolicitud'])->middleware('checkjefedepto')->name('jDepto.completarSolicitud');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Rutas para el subdirector
//Subdirector: global
Route::get('/subdirector',[AdminController::class, 'indexSubdirector'])->middleware('checksubdirector')->name('sub.index');
Route::get('/subdirector/perfil/{id}', [UserController::class, 'showSubdirector'])->middleware('checksubdirector')->name('sub.perfil');
Route::get('subdirector/editar_perfil/{id}', [UserController::class, 'edit'])->middleware('checksubdirector')->name('sub.editarPerfil');
//Subdirector: solicitudes
Route::get('/subdirector/solicitudes',[SolicitudController::class, 'solicitudesSub'])->middleware('checksubdirector')->name('sub.solicitudes');
Route::post('/subdirector',[SolicitudController::class, 'autorizarSolicitud'])->middleware('checksubdirector')->name('sub.autorizarSolicitud');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////