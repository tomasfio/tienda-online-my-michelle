<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductoFormRequest;
use App\Http\Requests\UpdateProductoFormRequest;
use App\Producto;
use App\Subcategoria;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('gestion.productos.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorias = Subcategoria::all();
        return view('gestion.productos.create', ['subcategorias' => $subcategorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductoFormRequest $request)
    {
        $producto = new Producto();
        $producto->codigo = request('codigo');
        $producto->descripcion = request('descripcion');
        $producto->observacion = request('observacion');
        $producto->subcategoria_id = $request->get('subcategoria');
        $producto->solo_minorista = $request->boolean('solo_minorista');
        $producto->en_stock = $request->boolean('hay_stock');
        $producto->precio_minorista = $request->get('precioMinorista');
        $producto->precio_mayorista = $request->get('precioMayorista');
        $producto->precio_blister = $request->get('precioBlister');
        $producto->activo = true;

        $producto->save();

        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(string $codigo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(string $codigo)
    {
        return view('gestion.productos.edit', [
            'producto' => Producto::where('codigo', 'LIKE', $codigo)->firstOrFail(),
            'subcategorias' => Subcategoria::all()
            ]);
    }

    public function update(UpdateProductoFormRequest $request, string $codigo)
    {
        $producto = Producto::where('codigo', 'LIKE', $codigo)->firstOrFail();

        $producto->descripcion = $request->get('descripcion');
        $producto->observacion = $request->get('observacion');
        $producto->subcategoria_id = $request->get('subcategoria');
        $producto->solo_minorista = $request->boolean('solo_minorista');
        $producto->en_stock = $request->boolean('hay_stock');
        $producto->precio_minorista = $request->get('precioMinorista');
        $producto->precio_mayorista = $request->get('precioMayorista');
        $producto->precio_blister = $request->get('precioBlister');

        $producto->update();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $codigo)
    {
        $producto = Producto::findOrFail($codigo);

        foreach($producto->imagenes as $imagen){
            $image_path = public_path().'/img/'.$imagen->nombre_imagen;
            if(File::exists($image_path)){
                File::delete($image_path);
            }
        }

        $producto->delete();
        return redirect('/productos');
    }
}
