<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Faker\Provider\ar_JO\Company;

class Person extends Authenticatable
{
    //

    protected $table = "persons";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'shipping_email'
    ];

    public function user(){
        return $this->hasOne(User::class, 'person_id', 'id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function companies()
    {
        return $this->hasMany(Company::class, 'product_id', 'id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'product_id', 'id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'product_id', 'id');
    }


    // TODO: Terminar funcionalidad
    // TODO: Relacion com empresa
    // TODO: Relacion com sucursales

}
