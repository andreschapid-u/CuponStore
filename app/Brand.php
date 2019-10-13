<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    // TODO: Crear funcionalidad

    protected $fillable = ['name'];

    /**
     *  Productos que son de la categoría
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
