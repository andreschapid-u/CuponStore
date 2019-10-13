<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    public function person()
    {
        return $this->hasMany(Person::class, 'role_id', 'id');
    }

    public function is($role = null)
    {
        return $this->name == $role;
    }
}
