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
        return $this->belongsTo(Rol::class, 'role_id', 'id');
    }

    // TODO: Terminar funcionalidad

}
