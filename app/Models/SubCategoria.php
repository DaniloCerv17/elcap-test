<?php

namespace App\Models;

use App\Models\Categoria;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'sub_categorias';
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_sub_categoria');
    }

    
}
