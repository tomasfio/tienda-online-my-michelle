<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $productos = Producto::where('codigo', 'LIKE', "%$query%")
                ->orWhere('descripcion', 'LIKE', "%$query%")
                ->orWhere('observacion', 'LIKE', "%$query%")
                ->where('activo', '=', '1')
                ->where('en_stock', '=', '1')
                ->where('solo_minorista', '=', '0')
                ->paginate(24);

                return view('tienda.productos', ['productos' => $productos, 'search' => $query, 'request' => $request]);
        }
        else{
            $productos = Producto::where('activo', '=', '1')
                ->where('en_stock', '=', '1')
                ->where('solo_minorista', '=', '0')
                ->paginate(24);
    
            return view('tienda.productos', ['productos' => $productos, 'request' => $request]);
        }
    }
}
