<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(string $codigo_producto){
        $producto = Producto::where('codigo', 'LIKE', $codigo_producto)
            ->where('activo', '=', '1')
            ->where('en_stock', '=', '1')
            ->where('solo_minorista', '=', '0')
            ->first();

        $opciones = $producto->opciones
            ->where('stock_opcion', '=', '1')
            ->where('activo', '=', '1');

        return view('tienda.producto',[
            'producto' => $producto,
            'opciones' => $opciones
            ]);
    }
}
