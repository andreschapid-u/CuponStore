<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['name', 'nit', 'image', 'image_s'];


    /**
     * La persona encargada por la empresa para realizar la redención
     * Recibe el código del cliente y verifica el estado del mismo
     */
    public function checker()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    /**
     * Función que retorna los cupones que le pertenecen a la empresa
     */
    public function coupones()
    {
        return $this->hasMany(Coupon::class, 'company_id', 'id');
    }

    /**
     * Función que retorna las sucursales de la empresa
     */
    public function purchases()
    {
        return $this->hasMany(Purchases::class, 'company_id', 'id');
    }

    // TODO: Terminar funcionalidad

}
