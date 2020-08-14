<?php

namespace App\Http\Controllers\Gestion;

use App\Http\Requests\AddProductoFormRequest;
use App\Http\Requests\UpdateProductoFormRequest;
use App\OpcionProducto;
use App\Producto;
use App\Subcategoria;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        if($request){
            $productos = Producto::where('codigo', 'LIKE', "%$query%")
                ->orWhere('descripcion', 'LIKE', "%$query%")
                ->orWhere('observacion', 'LIKE', "%$query%")
                ->orderBy('codigo', 'asc')
                ->paginate(20);
            return view('gestion.productos.index', ['productos' => $productos, 'search' => $query]);
        }
        else{
            $productos = Producto::all()->where('activo', '=', '1')->paginate(20);

            return view('gestion.productos.index', ['productos' => $productos]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorias = Subcategoria::all()->where('activo', '=', '1');
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
        $producto->cantidad_blister = $request->get('cantidadBlister');
        $producto->activo = true;

        $producto->save();
        
        $opcionesNames = $request->input('nombreOpc.*');
        $i = 0;
        if($opcionesNames != null){
            foreach($opcionesNames as $opcName){
                $opcion = new OpcionProducto();
                $opcion->cod_producto = $producto->codigo;
                $opcion->nombre_opcion = $opcName;
                $opcion->stock_opcion = $request->boolean("stockOpc.$i");
                $opcion->save();
    
                $i++;
            }
        }

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
            'opciones_producto' => OpcionProducto::all()->where('cod_producto', 'LIKE', $codigo),
            'subcategorias' => Subcategoria::all()->where('activo', '=', '1')
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
        $producto->cantidad_blister = $request->get('cantidadBlister');

        $producto->update();
        if($request->input('nombreOpc.*') != null){
            $cantOpciones = count($request->input('nombreOpc.*'));
    
            $i = 0;
            $opcionesIdUpdate = $request->input('idOpcionUpdate.*');
    
            if($opcionesIdUpdate != null){
                foreach($opcionesIdUpdate as $opcIdUpdate){
                    $opcionUpdate = OpcionProducto::findOrFail($opcIdUpdate);
                    $opcionUpdate->nombre_opcion = $request->input("nombreOpc.$i");
                    $opcionUpdate->stock_opcion = $request->boolean("stockOpc.$i");
                    $opcionUpdate->update();
        
                    $i++;
                }
            }
    
            for( ; $i < $cantOpciones; $i++){
                $opcion = new OpcionProducto();
                $opcion->cod_producto = $producto->codigo;
                $opcion->nombre_opcion = $request->input("nombreOpc.$i");
                $opcion->stock_opcion = $request->boolean("stockOpc.$i");
                $opcion->save();
            }
        }
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
        $producto->DeleteImagenes();
        $producto->delete();
        return redirect('/productos');
    }
}
