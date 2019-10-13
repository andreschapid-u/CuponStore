<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name'
    ];

    /**
     * Ciudades que pertenecen al Departamento
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'department_id', 'id');
    }

    // TODO: Terminar funcionalidad

}
