<?php

namespace App\Http\Controllers;

use App\Mail\ReservaCreatedMail;
use App\Models\Reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservasController extends Controller
{

    public function index(Reservas $reserva)
    {

        return view('front/confirmar-reserva', [
            'reserva' => $reserva
        ]);
    }



    public function store(Request $request)
    {



        $request->validate([
            'nombre' => 'required|min:5|max:30',
            'apellido' => 'required|min:5|max:30',
            'telefono' => 'required|max:12',
            'numPersonas' => 'required|numeric|max:20',
            'email' => 'required|email|max:100',
            'fecha' => 'required',
            'hora' => 'required|after_or_equal:12:00:00 |before_or_equal:17:00:00 ',

        ], [
            'nombre.required' => 'Coloque un Nombre',
            'nombre.min' => 'Coloque mínimo 5 caracteres',
            'nombre.max' => 'Coloque menos de 30 caracteres',
            'apellido.required' => 'Coloque un apellido',
            'apellido.min' => 'Coloque mínimo 5 caracteres',
            'apellido.max' => 'Coloque menos de 30 caracteres',
            'telefono.required' => 'coloque un num de telefono',
            'telefono.numeric' => 'Coloque un número, no letra',
            'telefono.max' => 'coloque al menos 10 u 11 digitos',
            'numPersonas.required' => 'Coloque un Numero de Personas',
            'numPersonas.numeric' => 'Coloque un número, no letra',
            'numPersonas.max' => 'Solo 20 personas como Max.',
            'email.required' => 'Coloque un correo electrónico',
            'email.email' => 'Coloque un correo electrónico válido',
            'email.max' => 'El correo no debe tener más de 100 caracteres',
            'fecha.required' => 'Coloque una fecha',
            'hora.required' => 'coloque una hora',
            'hora.after_or_equal' => 'El horario es de 12pm a 5pm',
            'hora.before_or_equal' => 'El horario es de 12pm a 5pm',



        ]);

        $reserva = new Reservas();
        $reserva->nombre = $request->nombre;
        $reserva->apellido = $request->apellido;
        $reserva->telefono = $request->telefono;
        $reserva->email = $request->email;
        $reserva->numPersonas = $request->numPersonas;
        $reserva->fecha = $request->fecha;
        $reserva->hora = $request->hora;

        $reserva->save();

        Mail::to('prueba@prueba.com')->send(new ReservaCreatedMail($reserva));


        return redirect('/')->with('mensajes', '¡Reservado Correctamente!');
    }
}
