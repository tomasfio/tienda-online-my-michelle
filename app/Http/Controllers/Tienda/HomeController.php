<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productos_vendidos = Producto::where('activo', '=', '1')
            ->where('en_stock', '=', '1')
            ->where('solo_minorista', '=', '0')
            ->orderBy('codigo', 'asc')
            ->paginate(12);

        $productos_nuevo = Producto::where('activo', '=', '1')
            ->where('en_stock', '=', '1')
            ->where('solo_minorista', '=', '0')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('tienda.home', [
            'productos_mas_vendidos' => $productos_vendidos,
            'productos_mas_nuevos' => $productos_nuevo
        ]);
    }
}
