<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use App\Producto;
use App\Subcategoria;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
    public function index(string $nombre_subcategoria)
    {
        $subcategoria = Subcategoria::where('nombre', '=', $nombre_subcategoria)
            ->where('activo', '=', '1')
            ->first();

        $productos = Producto::where('subcategoria_id', '=', $subcategoria->id)
            ->where('activo', '=', '1')
            ->where('en_stock', '=', '1')
            ->where('solo_minorista', '=', '0')
            ->paginate(24);

        return view('tienda.subcategoria', [
            'subcategoria' => $subcategoria,
            'productos' => $productos
        ]);
    }
}
