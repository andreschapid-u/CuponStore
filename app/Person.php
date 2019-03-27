<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        return $this->hasMany(Company::class, 'person_id', 'id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'person_id', 'id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'person_id', 'id');
    }

    public function cuponsCart()
    {
        return $this->belongsToMany(Coupon::class,"carts")->withPivot(["amount"]);
    }

    public function getFullName()
    {
        return $this->first_name. ' ' .$this->last_name;
    }


    // TODO: Terminar funcionalidad
    // TODO: Relación com empresa
    // TODO: Relación com sucursales

}
