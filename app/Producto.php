<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table='productos';
    protected $fillable = ['nombre', 'descripcion','imagen', 'imagen_m', 'imagen_p'];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
