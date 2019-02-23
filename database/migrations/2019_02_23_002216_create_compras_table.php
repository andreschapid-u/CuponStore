<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cupon_code',30)->unique();
            $table->enum('estado',['Pendiente','Reclamado','Vencido']);

            $table->unsignedInteger('cupon_id');
            $table->foreign('cupon_id')->references('id')->on('cupones');
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->unsignedInteger('forma_pago_id');
            $table->foreign('forma_pago_id')->references('id')->on('formas_pago');

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
        Schema::dropIfExists('compras');
    }
}
