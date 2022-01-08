<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\EquipoController; 
use App\Http\Controllers\PrestamoEquipoController; 
use App\Http\Controllers\AuditoriaController; 

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Usuarios
Route::get('/usuarios', [UserController::class, 'index'],function ()
{
    return view('admin/usuarios/index');
});
Route::get('/getUser', [UserController::class, 'getUser']);
Route::post('/usersAdd', [UserController::class, 'store']);
Route::put('/usersUpdate/{id}', [UserController::class, 'update']);
Route::delete('/usersDelete/{id}', [UserController::class, 'destroy']);


//Equipos
Route::get('/equipos', [EquipoController::class, 'index'],function ()
{
    return view('admin/equipos/index');
});

Route::get('/getData', [EquipoController::class, 'getData']);

Route::get('/prestamos',  [PrestamoEquipoController::class, 'index'], function ()
{
    return view('admin/prestamos/index');
});

Route::get('/getPrestamos', [PrestamoEquipoController::class, 'getPrestamos']);

Route::get('/auditoria', [AuditoriaController::class, 'index'],function ()
{
    return view('admin/auditoria/index');
});

Route::get('/getAuditoria', [AuditoriaController::class, 'getAuditoria']);
