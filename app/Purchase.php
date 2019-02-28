<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Provider\fr_FR\Person;

class Purchase extends Model
{

    protected $table = 'purchases';
    protected $fillable = ['coupon_code', 'state'];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }
    // TODO: Crear duncionalidad
}
