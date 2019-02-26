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
        return $this->belongsTo(Departamento::class, 'department_id', 'id');
    }

    // TODO: Terminar funcionalidad

}
