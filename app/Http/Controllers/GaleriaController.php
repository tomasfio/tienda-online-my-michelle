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

        return view('gestion.productos.galleria.index',[
            'imagenes' => $imagenes,
            'producto' => Producto::find($codigo)
        ]);
    }

    public function add(string $codigo,ImagenProductoRequest $request){
        $imagenes = ImagenesProducto::all()->where('cod_producto', 'LIKE', $codigo);

        $imagen = new ImagenesProducto();
        $file = $request->imagen;
        $nuevoNombre = $codigo . '_' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path().'/img', $nuevoNombre);
        $imagen->nombre_imagen = $nuevoNombre;
        $imagen->cod_producto = $codigo;
        if(count($imagenes) == 0){
            $imagen->principal = true;
        }
        else{
            $imagen->principal = false;
        }

        $imagen->save();


        return redirect("/gestion/productos/$codigo/galeria");
    }

    public function delete(string $imagen){
        $img = ImagenesProducto::findOrFail($imagen);

        $codigo = $img->cod_producto;
        $image_path = public_path().'/img/'.$img->nombre_imagen;
        if(File::exists($image_path)){
            File::delete($image_path);
        }

        $img->delete();
        return redirect("/gestion/productos/$codigo/galeria");
    }

    public function update(string $imagen){
        $img = ImagenesProducto::findOrFail($imagen);
        $imgAnteriorPrincipal = ImagenesProducto::all()->where('cod_producto', $img->cod_producto)
            ->where('principal', 1);

        if(count($imgAnteriorPrincipal) != 0){
            foreach($imgAnteriorPrincipal as $imgA){
                $imgA->principal = false;
                $imgA->update();
            }
        }

        $img->principal = true;
        $img->update();
        return redirect("/gestion/productos/$img->cod_producto/galeria");
    }
}
