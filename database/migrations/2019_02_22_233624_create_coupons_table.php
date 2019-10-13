<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('stock')->unsigned();
            $table->smallInteger('discount')->unsigned();
            $table->dateTime('expiration');
            $table->boolean('state')->default(1);

            $table->unsignedDecimal('price',10,2);
            $table->unsignedDecimal('base_price',10,2);

            // El cupon esta relacionado a un producto
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            // La empresa a la que pertenece el cupon
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
