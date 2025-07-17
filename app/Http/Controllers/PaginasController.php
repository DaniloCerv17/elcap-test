<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
  public function index()
  {
    return view('front/index');
  }

  public function menu()
  {


    $comidas = Producto::porCategoria('comidas');
    $bebidas = Producto::porCategoria('bebidas');
    $shots = Producto::porCategoria('shots');
    $temporadas = Producto::porCategoria('temporada');

    return view('front.menu', [
      'comidas' => $comidas,
      'bebidas' => $bebidas,
      'shots' => $shots,
      'temporadas' => $temporadas,
    ]);
  }

  public function nosotros()
  {
    return view('front/nosotros');
  }

  public function reservar()
  {
    return view('front/reservar');
  }

  public function cultura()
  {
    $publicaciones = Publicacion::all();

    return view('front.cultura', [
      'publicaciones' => $publicaciones
    ]);
  }


  // public function login()
  // {
  //   return view('front/login');
  // }
}
