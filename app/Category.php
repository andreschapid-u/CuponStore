<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    protected $fillable = [
        'name'
    ];

    /**
     *  Productos que son de la categoría
     */
    public function products(){
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    // TODO: Terminar funcionalidad

}
