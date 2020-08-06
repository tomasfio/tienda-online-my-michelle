<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagenProductoRequest;
use App\ImagenesProducto;
use App\Producto;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function index(string $codigo){
        $imagenes = ImagenesProducto::all()->where('cod_producto', 'LIKE', $codigo);

        return view('productos.galleria.index',[
            'imagenes' => $imagenes,
            'producto' => Producto::find($codigo)
        ]);
    }

    public function add(string $codigo,ImagenProductoRequest $request){
        $imagen = new ImagenesProducto();
        $file = $request->imagen;
        $nuevoNombre = $codigo . '_' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path().'/img', $nuevoNombre);
        $imagen->nombre_imagen = $nuevoNombre;
        $imagen->cod_producto = $codigo;

        $imagen->save();

        $imagenes = ImagenesProducto::all()->where('cod_producto', 'LIKE', $codigo);

        return redirect("/productos/$codigo/galeria");
    }

    public function delete(string $imagen){
        $img = ImagenesProducto::findOrFail($imagen);

        $codigo = $img->cod_producto;
        $image_path = public_path().'/img/'.$img->nombre_imagen;
        if(File::exists($image_path)){
            File::delete($image_path);
        }

        $img->delete();
        return redirect("/productos/$codigo/galeria");
    }
}
