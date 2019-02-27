<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Provider\lt_LT\Company;

class Branch extends Model
{
    protected $table = 'branches';
    protected $fillable = ['address', 'telephone'];

    /**
     * Ciudad en donde esta la sucursal
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    /**
     * Empresa a la que pertenece la sucursal
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
