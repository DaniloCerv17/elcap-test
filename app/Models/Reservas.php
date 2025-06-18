<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
      protected $table = 'reservas';

}


// <x-app-layout>
//     <h1>Reservas</h1>

       
//     <div class=" table-reservas">
//         <table class="contenedor">
//             <thead>
//                 <tr>
//                     <th">#</th>
//                     <th">Nombre</th>
//                     <th">Apellido</th>
//                     <th">Telefono</th>
//                     <th">Email</th>
//                     <th">Num Personas</th>
//                     <th">Fecha</th>
//                     <th">Hora</th>
//                 </tr>
//             </thead>
//             <tbody>
//                 @foreach ($reservas as $reserva)
//                 <tr>
//                     <td>{{$reserva->id}}</td>
//                     <td>{{$reserva->nombre}}</td>
//                     <td>{{$reserva->apellido}}</td>
//                     <td>{{$reserva->telefono}}</td>
//                     <td>{{$reserva->email}}</td>
//                     <td>{{$reserva->numPersonas}}</td>
//                      <td>{{$reserva->fecha}}</td>
//                       <td>{{$reserva->hora}}</td>


//                 </tr>
               

//                     @endforeach
//             </tbody>
//         </table>
//     </div>


// </x-app-layout>