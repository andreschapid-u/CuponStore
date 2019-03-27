<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    protected $table = "carts";
}
