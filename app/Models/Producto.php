<?php

namespace App\Models;

use App\Models\SubCategoria;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{


    //campos de asignacion masiva
    protected $fillable = [

        'nombre',

        'precio',

        'descripcion',

        // 'imagen',

        'slug',

        'id_sub_categoria',





    ];


    public function subCategoria()
    {
        return $this->belongsTo(SubCategoria::class, 'id_sub_categoria');
    }


    public static function porCategoria($nombre)
    {
        return self::whereHas('subCategoria.categoria', function ($q) use ($nombre) {
            $q->where('nombre', $nombre);
        })->get();
    }





    public function getRouteKeyName()
    {
        return 'slug';
    }
}
