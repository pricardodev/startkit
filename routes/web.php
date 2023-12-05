<?php

use App\Http\Controllers\Authorization\PermissionController;
use App\Http\Controllers\Authorization\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('user/{user}/roles', 'UserController@roles')->name('user.roles');
Route::put('user/{user}/roles', 'UserController@rolesSync')->name('user.roles');
Route::resource('user', 'UserController');

// Perfil usuários (Role)
Route::get('/listar/perfil', [RoleController::class, 'index'])->name('listar.perfil');
Route::get('/criar/perfil', [RoleController::class, 'create'])->name('criar.perfil');
Route::post('/criar/perfil', [RoleController::class, 'store'])->name('criar.perfil');
Route::get('/editar/perfil/{perfil}', [RoleController::class, 'edit'])->name('editar.perfil');
Route::put('/atualizar/perfil', [RoleController::class, 'update'])->name('atualizar.perfil');
Route::delete('/deletar/perfil', [RoleController::class, 'destroy'])->name('deletar.perfil');
Route::get('/vincular/perfil/{perfil}/permissao', [RoleController::class, 'permissions'])->name('vincular.perfil.permissao');
Route::put('/vincular/perfil/{perfil}/permissao', [RoleController::class, 'permissionsSync'])->name('vincular.perfil.permissao');

// Permission
Route::get('/listar/permissao', [PermissionController::class, 'index'])->name('listar.permissao');
Route::get('/criar/permissao', [PermissionController::class, 'create'])->name('criar.permissao');
Route::post('/criar/permissao', [PermissionController::class, 'store'])->name('criar.permissao');
Route::get('/editar/permissao/{permissao}', [PermissionController::class, 'edit'])->name('editar.permissao');
Route::put('/atualizar/permissao', [PermissionController::class, 'update'])->name('atualizar.permissao');
Route::delete('/deletar/permissao', [PermissionController::class, 'destroy'])->name('deletar.permissao');
