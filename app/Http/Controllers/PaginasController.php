<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
  public function index()
  {
    return view('front/index');
  }

  public function menu()
  {
    return view('front/menu');
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
    return view('front/cultura');
  }
}
