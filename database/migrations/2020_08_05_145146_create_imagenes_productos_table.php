<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_productos', function (Blueprint $table) {
            $table->string('nombre_imagen');
            $table->string('cod_producto');
            $table->boolean('principal');

            $table->primary('nombre_imagen');
            $table->foreign('cod_producto')
                ->references('codigo')->on('productos')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::table('subcategorias', function(Blueprint $table){
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_productos');

        Schema::table('subcategorias', function(Blueprint $table){
            $table->dropColumn('activo');
        });
    }
}
