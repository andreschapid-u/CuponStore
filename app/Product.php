<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table='products';
    protected $fillable = ['name', 'description','image', 'image_m', 'image_s'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    // TODO: Terminar funcionalidad

    public function branches()
    {
        return $this->belongsToMany(Branch::class)->withTimestamps();
        // ->using(BranchProduct::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'product_id', 'id');
    }

}
