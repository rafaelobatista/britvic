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

Route::get('/home', function () {
    return redirect('/veiculos');
});

Route::resource('/veiculos', VeiculosController::class)->middleware('auth');
Route::get('/veiculos/{veiculo}/bookings', [VeiculosController::class, 'bookings']);
Route::post('/veiculos/{veiculo}/book/{date}', [VeiculosController::class, 'book']);
Route::post('/veiculos/{veiculo}/cancel-booking/{date}', [VeiculosController::class, 'cancelBooking']);

Route::resource('/usuarios', UsuariosController::class)->middleware('auth');

Auth::routes();