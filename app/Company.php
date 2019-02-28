<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['name', 'nit', 'image', 'image_s'];


    /**
     * Jefe de  la empresa
     */
    public function boss()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    /**
     * Función que retorna los cupones que le pertenecen a la empresa
     */
    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'company_id', 'id');
    }

    /**
     * Función que retorna las sucursales de la empresa
     */
    public function branches()
    {
        return $this->hasMany(Branch::class, 'company_id', 'id');
    }

    // TODO: Terminar funcionalidad

}
