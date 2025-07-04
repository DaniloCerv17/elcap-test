<?php

use App\Http\Controllers\ComidaController;
use App\Http\Controllers\PaginasAdminController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\ReservasController;

use Illuminate\Support\Facades\Route;


//RUTAS DEL FRONTEND

Route::get('/', [PaginasController::class, 'index'])->name('front.home');
Route::get('front/menu', [PaginasController::class, 'menu'])->name('front.menu');
Route::get('front/nosotros', [PaginasController::class, 'nosotros'])->name('front.nosotros');
Route::get('front/reservar', [PaginasController::class, 'reservar'])->name('front.reservar');
Route::get('front/cultura', [PaginasController::class, 'cultura'])->name('front.cultura');

Route::get('front/login', [PaginasController::class, 'login'])->name('front.login');

//RUTAS DEL BACKEND
Route::post('back/index', [ReservasController::class, 'store'])->name('reserva.store');
Route::get('back/index', [PaginasAdminController::class, 'index'])->name('back.index');
Route::get('back/reservas', [PaginasAdminController::class, 'reservas'])->name('back.reservas');
Route::get('back/cultura', [PaginasAdminController::class, 'cultura'])->name('back.cultura');

//publicaciones
Route::resource('back/comidas', ComidaController::class);

//comidas
Route::resource('back/publicacion', PublicacionesController::class); //RUTAS PARA CRUD DE COMIDAS comidas.store,index,etc

// Route::get('back/comidas', [ComidaController::class, 'comidas'])->name('back.comidas');



// Route::get('/', [PaginasController::class, 'index']);
// Route::get('front/menu', [PaginasController::class, 'menu']);
// Route::get('front/nosotros', [PaginasController::class, 'nosotros']);
// Route::get('front/reservar', [PaginasController::class, 'reservar']);
// Route::get('front/cultura', [PaginasController::class, 'cultura']);