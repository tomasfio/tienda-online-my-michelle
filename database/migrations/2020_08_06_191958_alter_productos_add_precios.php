<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductosAddPrecios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function(Blueprint $table){
            $table->double('precio_minorista')->nullable()->after('subcategoria_id');
            $table->double('precio_mayorista')->nullable()->after('precio_minorista');
            $table->double('precio_blister')->nullable()->after('precio_mayorista');
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
            $table->dropColumn('precio_minorista');
            $table->dropColumn('precio_mayorista');
            $table->dropColumn('precio_blister');
        });
    }
}
