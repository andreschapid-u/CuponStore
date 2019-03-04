<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function isAdmin()
    {
        return $this->person->role->is('Administrador');
    }
    public function isEmpresario()
    {
        return $this->person->role->is('Empresario');
    }
    public function isChecker()
    {
        return $this->person->role->is('Checker');
    }
    public function isPublicista()
    {
        return $this->person->role->is('Publicista');
    }
}
