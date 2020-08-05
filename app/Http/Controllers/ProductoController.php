<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Producto;
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
        return view('productos.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->cod_producto = request('codigo');
        $producto->descripcion = request('descripcion');
        $producto->observacion = request('observacion');
        $producto->solo_minorista = $request->boolean('solo_minorista');
        $producto->en_stock = $request->boolean('hay_stock');
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
        return view('productos.edit', ['producto' => Producto::where('cod_producto', 'LIKE', $codigo)->firstOrFail()]);
    }

    public function update(ProductFormRequest $request, string $codigo)
    {
        $producto = Producto::where('cod_producto', 'LIKE', $codigo)->firstOrFail();

        $producto->descripcion = $request->get('descripcion');
        $producto->observacion = $request->get('observacion');
        $producto->solo_minorista = $request->boolean('solo_minorista');
        $producto->en_stock = $request->boolean('hay_stock');

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
        //
    }
}
