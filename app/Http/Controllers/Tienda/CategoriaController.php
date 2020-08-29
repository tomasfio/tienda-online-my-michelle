<?php

namespace App\Http\Controllers\Tienda;

use App\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(string $nombre_categoria){
        $categoria = Categoria::where('nombre', '=', $nombre_categoria)
            ->where('activo', '=', '1')
            ->first();
        return view('tienda.categoria', ['categoria' => $categoria]);
    }
}
