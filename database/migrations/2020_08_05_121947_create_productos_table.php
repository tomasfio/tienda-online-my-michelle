<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->string('codigo', 30)->unique();
            $table->string('descripcion', 5000);
            $table->string('observacion', 5000)->nullable();
            $table->boolean('solo_minorista');
            $table->boolean('en_stock');
            $table->boolean('activo');
            $table->unsignedBigInteger('subcategoria_id');
            $table->timestamps();

            $table->primary('codigo');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
