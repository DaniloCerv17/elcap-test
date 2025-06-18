<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function store(Request $request){
        $reserva = new Reservas();
        $reserva->nombre = $request->nombre;
        $reserva->apellido = $request->apellido;
        $reserva->telefono = $request->telefono;
        $reserva->email = $request->email;
        $reserva->numPersonas = $request->numPersonas;
        $reserva->fecha = $request->fecha;
        $reserva->hora = $request->hora;

        $reserva->save();
        
        return redirect('/');

    }
}
