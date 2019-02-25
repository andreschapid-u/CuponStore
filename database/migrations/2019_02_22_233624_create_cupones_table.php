<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupones', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('stock')->unsigned();
            $table->smallInteger('descuento')->unsigned();
            $table->dateTime('vencimiento');
            $table->boolean('estado')->default(1);

            $table->unsignedDecimal('precio',10,2);
            $table->unsignedDecimal('precio_base',10,2);

            // El cupon esta relacionado a un producto
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            // La empresa a la que pertenece el cupon
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');

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
        Schema::dropIfExists('cupones');
    }
}
