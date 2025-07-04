<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
       protected $table = 'publicaciones';

         protected $fillable = [

        'titulo',

        'contenido',

        'fecha',

        'hora',

       
    


    ];


       
    public function getRouteKeyName(){
        return 'slug';
    }
}
