<?php

namespace App\Http\Controllers;

use App\Models\Reservas;

use Illuminate\Http\Request;

class PaginasAdminController extends Controller
{
    public function index()
    {
        return view('back/index');
    }

    public function reservas()
    {

        $reservas = Reservas::all();

        return view('back.reservas', [
            'reservas' => $reservas
        ]);
        // return view('back/reservas');
    }

    public function cultura()
    {
        return view('back/cultura');
    }

   

    public function test()
    {
        return view('back/test');
    }
}
