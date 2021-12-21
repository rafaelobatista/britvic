<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\UsuariosController;

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
    return redirect('/veiculos');
});

Route::resource('/veiculos', VeiculosController::class)->middleware('auth');
Route::resource('/usuarios', UsuariosController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
