<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Coupon extends Model
{

    protected $table = 'coupons';

    protected $fillable = ['stock', 'discount', 'state', 'expiration', 'price', 'base_price'];

    // TODO: Crear funcionalidad

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function status()
    {
        return $this->state ? "Activo" : "Inactivo";
    }
}
