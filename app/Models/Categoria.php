<?php

namespace App\Models;
use App\Models\SubCategoria;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $fillable = [

        'nombre',

        'slug',

    ];
    public function subCategorias(){
        return $this->hasMany(SubCategoria::class, 'id_categoria');
    }
}
