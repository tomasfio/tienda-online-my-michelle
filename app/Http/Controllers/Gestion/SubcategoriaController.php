<?php

namespace App\Http\Controllers\Gestion;

use App\Http\Requests\SubcategoriFormRequest;
use App\Categoria;
use App\Subcategoria;


use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;

class SubcategoriaController extends Controller
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
            $subcategorias = Subcategoria::where('nombre', 'LIKE', '%'.$query.'%')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->paginate(20);
            return view('gestion.subcategorias.index', ['subcategorias' => $subcategorias, 'search' => $query]);
        }
        else{
            $subcategorias = Subcategoria::all()->where('activo', '=', '1')->paginate(20);
            return view('gestion.subcategorias.index', ['subcategorias' => $subcategorias]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->where('activo', '=', '1');
        return view('gestion.subcategorias.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoriFormRequest $request)
    {
        $subcategoria = new Subcategoria();
        $subcategoria->nombre = $request->get('nombre');
        $subcategoria->categoria_id = $request->get('categoria');
        if($request->imagen){
            $file = $request->imagen;
            $nombre_imagen = str_replace(' ', '_', $request->get('nombre')) . '_' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path().'/img', $nombre_imagen);
            $subcategoria->nombre_imagen = $nombre_imagen;
        }

        $subcategoria->save();

        return redirect('/gestion/subcategorias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $categorias = Categoria::all()->where('activo', '=', '1');
        $subcategoria = Subcategoria::findOrFail($id);

        return view('gestion.subcategorias.edit', [
            'subcategoria' => $subcategoria,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoriFormRequest $request, int $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);

        $subcategoria->nombre = $request->get('nombre');
        $subcategoria->categoria_id = $request->get('categoria');
        if($request->imagen){
            $subcategoria->delete_imagen();
            $file = $request->imagen;
            $nombre_imagen = str_replace(' ', '_', $request->get('nombre')) . '_' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path().'/img', $nombre_imagen);
            $subcategoria->nombre_imagen = $nombre_imagen;
        }

        $subcategoria->update();

        return redirect('/gestion/subcategorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->deleteProductos();
        try{
            $subcategoria->delete_imagen();
            $subcategoria->delete();
        }
        catch (QueryException $e) {
            $subcategoria->activo = false;
            $subcategoria->update();
        }

        return redirect('/gestion/subcategorias');
    }
}
