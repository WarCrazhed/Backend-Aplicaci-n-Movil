<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
//Route::get('/login/{email}/{password}', [UserController::class, 'login']);

// UserController
Route::post('/login', [UserController::class, 'login']);
Route::get('/usuarios/{usuario?}', [UserController::class, 'getUsers']);
Route::put('/editarusuario/', [UserController::class, 'editarUsuario']);
Route::delete('/eliminarusuario/{id}', [UserController::class, 'eliminarUsuario']);

// RestauranteController
Route::get('/restaurantes/{restaurant?}', [RestauranteController::class, 'restaurantes']);
Route::put('/editarrestaurant/', [RestauranteController::class, 'editarRestaurante']);
Route::delete('/eliminarrestaurant/{id}', [RestauranteController::class, 'eliminarRestaurante']);

// EventoController
Route::get('/eventos/{evento?}', [EventoController::class, 'eventos']);

// InvitacionController
Route::get('/codigo/', [InvitacionController::class, 'codigo']);

Route::post('/invitar/', [InvitacionController::class, 'invitar']);
Route::get('/invitaciones/{id}/{evento?}',[InvitacionController::class, 'getInvitaciones']);
Route::get('/invitacionesadmin/{id?}/{usuario?}',[InvitacionController::class, 'getInvitacionesAdmin']);
Route::put('/ingresar/', [InvitacionController::class, 'ingresar']);

//Route::get('/restaurantes/', [RestauranteController::class, 'restaurantes']);
