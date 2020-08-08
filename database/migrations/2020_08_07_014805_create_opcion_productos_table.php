<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcion_productos', function (Blueprint $table) {
            $table->id();
            $table->string('cod_producto');
            $table->string('nombre_opcion');
            $table->boolean('stock_opcion');
            $table->timestamps();

            $table->foreign('cod_producto')
                ->references('codigo')->on('productos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opcion_productos');
    }
}
