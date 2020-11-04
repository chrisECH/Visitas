<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('/admin/admin_inicio');
});

Route::get('/base', function () {
    return view('base');
});

Route::get('/admin/usuarios',[AdminController::class,'usuarios']);
Route::get('/admin/rol',[AdminController::class, 'rol']); 
Route::get('/admin/departamentos',[AdminController::class, 'departamentos']);
Route::get('/admin/carreras',[AdminController::class, 'carreras']);
Route::get('/admin/empresas',[AdminController::class, 'empresas']); 
Route::get('/admin/solicitudes',[AdminController::class, 'solicitudes']); 
Route::get('/admin/departamentos/editar',[AdminController::class, 'edit_depto']);
Route::get('/admin/rol/editar',[AdminController::class, 'edit_rol']);
Route::get('/admin/usuarios/editar',[AdminController::class, 'edit_users']);