<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoriFormRequest;
use App\Categoria;
use App\Subcategoria;
use Illuminate\Http\Request;

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
                ->orderBy('id', 'asc')
                ->paginate(20);
            return view('subcategorias.index', ['subcategorias' => $subcategorias, 'search' => $query]);
        }
        else{
            $subcategorias = Subcategoria::all()->paginate(20);
            return view('subcategorias.index', ['subcategorias' => $subcategorias]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategorias.create', ['categorias' => $categorias]);
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
        $subcategoria->save();

        return redirect('/subcategorias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $categorias = Categoria::all();
        $subcategoria = Subcategoria::findOrFail($id);

        return view('subcategorias.edit', [
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
        $subcategoria->update();

        return redirect('/subcategorias');
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
        $subcategoria->delete();

        return redirect('/subcategorias');
    }
}