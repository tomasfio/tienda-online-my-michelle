<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductoAndSubcategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function(Blueprint $table){
           $table->string('cantidad_blister')->nullable()->after('precio_blister');
        });

        Schema::table('subcategorias', function(Blueprint $table){
            $table->string('nombre_iamgen')->nullable()->after('categoria_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function(Blueprint $table){
            $table->dropColumn('cantidad_blister');
         });
 
         Schema::table('subcategorias', function(Blueprint $table){
             $table->dropColumn('nombre_iamgen');
         });
    }
}
