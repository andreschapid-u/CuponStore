<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Departamento al que pertenece la ciudad
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    /**
     * Sucursales que hay en esa ciudad
     */
    public function branches()
    {
        return $this->hasMany(Branch::class, 'city_id', 'id');
    }

    // TODO: Terminar funcionalidad

}
