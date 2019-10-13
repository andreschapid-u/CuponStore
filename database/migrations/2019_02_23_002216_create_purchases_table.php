<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coupon_code',30)->unique();
            $table->enum('state',['Pendiente','Reclamado','Vencido']);

            $table->unsignedInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->unsignedInteger('person_id');
            $table->foreign('person_id')->references('id')->on('persons');
            $table->unsignedInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');

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
        Schema::dropIfExists('purchases');
    }
}
