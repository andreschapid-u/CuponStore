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

    /**
     * La persona encargada por la empresa para realizar la redención
     * Recibe el código del cliente y verifica el estado del mismo
     */
    public function checker()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
        // ->using(BranchProduct::class);
    }

    public function toString()
    {
        return $this->city->name.", ".$this->address;
    }

}
