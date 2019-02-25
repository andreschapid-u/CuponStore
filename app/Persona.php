<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Persona extends Authenticatable
{
    //

    protected $table = "personas";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'correo_envio'
    ];

    public function user(){
        return $this->hasOne(User::class, 'persona_id', 'id');
    }

    public function rol(){
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }
}
