<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::firstOrCreate(['nombre' => 'Anillos']);
        Categoria::firstOrCreate(['nombre' => 'Collares']);
        Categoria::firstOrCreate(['nombre' => 'Dijes']);
        Categoria::firstOrCreate(['nombre' => 'Mochilas']);
        Categoria::firstOrCreate(['nombre' => 'Mates']);
        Categoria::firstOrCreate(['nombre' => 'Pulseras']);
        Categoria::firstOrCreate(['nombre' => 'Estampados']);
        Categoria::firstOrCreate(['nombre' => 'Billeteras']);
        Categoria::firstOrCreate(['nombre' => 'Otros']);
    }
}
