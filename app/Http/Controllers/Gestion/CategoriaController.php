<?php

namespace App\Http\Controllers\Gestion;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;
use App\Producto;
use App\Subcategoria;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->get('search'));

        if($request){
            $categoria = Categoria::where('nombre' , 'LIKE', "%$query%")
            ->where('activo', '=', '1')
            ->orderBy('id', 'asc')
            ->paginate(20);
            return view('gestion.categorias.index', ['categorias' => $categoria, 'search' => $query]);
        }
        else{
            $categoria = Categoria::all()->where('activo', '=', '1')->paginate(20);
            return view('gestion.categorias.index', ['categorias' => $categoria]);
        }
    }

    public function create()
    {
        return view('gestion.categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->get('nombre');
        $categoria->save();

        return redirect('/gestion/categorias');
    }
    
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('gestion.categorias.edit', ['categoria' => $categoria]);
    }
    
    public function update(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->update();

        return redirect('/gestion/categorias');
    }
    
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->deleteSubcategorias();
        try{
            $categoria->delete();
        }
        catch(QueryException $e){
            $categoria->activo = false;
            $categoria->update();
        }

        return redirect('/gestion/categorias');
    }
}
