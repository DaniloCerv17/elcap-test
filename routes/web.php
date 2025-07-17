<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\PaginasAdminController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\ShotsController;
use App\Http\Controllers\TemporadaController;
use Illuminate\Support\Facades\Route;


//RUTAS DEL FRONTEND
Route::get('/', [PaginasController::class, 'index'])->name('front.home');
Route::get('front/menu', [PaginasController::class, 'menu'])->name('front.menu');
Route::get('front/nosotros', [PaginasController::class, 'nosotros'])->name('front.nosotros');
Route::get('front/reservar', [PaginasController::class, 'reservar'])->name('front.reservar');
Route::get('front/cultura', [PaginasController::class, 'cultura'])->name('front.cultura');

//alamcenar reservars al back
Route::post('back/index', [ReservasController::class, 'store'])->name('reserva.store');

//-------------------------------------------------------------------------------------------------------------------

//login
Route::get('auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/dashboard', function () {
    return view('back.index');
})->middleware('auth');

//-------------------------------------------------------------------------------------------------------------------

//endpoint para confirmar reserva
Route::get('front/confirmar-reserva{reserva}', [ReservasController::class, 'index'])->name('reserva.index');
//Route::get('back/reserva/confirmar/{id}', [ReservasController::class,


Route::middleware('auth')->group(function () {



    //RUTAS DEL BACKEND

    Route::get('back/index', [PaginasAdminController::class, 'index'])->name('back.index');
    Route::get('back/reservas', [PaginasAdminController::class, 'reservas'])->name('back.reservas');
    Route::get('back/cultura', [PaginasAdminController::class, 'cultura'])->name('back.cultura');

    //RUTAS PARA CRUD DE COMIDAS comidas.store,index,etc

    //publicaciones
    Route::resource('back/comidas', ComidaController::class);

    //comidas
    Route::resource('back/publicacion', PublicacionesController::class);

    //bebidas
    Route::resource('back/bebidas', BebidaController::class);

    //shots
    Route::resource('back/shots', ShotsController::class);

    //temporada
    Route::resource('back/temporada', TemporadaController::class);
});
