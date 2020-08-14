<?php

namespace App\Http\Controllers\Gestion;

use App\Categoria;
use App\Cliente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gestion\Cliente\AddClienteRequest;
use App\Http\Requests\Gestion\Cliente\UpdateClienteRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
            $clientes = Cliente::where('nombre', 'LIKE', "%$query%")
                ->where('apellido', 'LIKE', "%$query%")
                ->where('email', 'LIKE', "%$query%")
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->paginate(20);

                return view('gestion.clientes.index', ['clientes' => $clientes, 'search' => $query]);
        }
        else{
            $clientes = Categoria::all()->where('activo', '=', '1')->paginate(20);
            return view('gestion.clientes.index', ['clientes' => $clientes]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddClienteRequest $request)
    {
        $cliente = new Cliente();
        $cliente->email = $request->get('email');
        $cliente->nombre = $request->get('nombre');
        $cliente->apellido = $request->get('apellido');
        $cliente->codigo_postal = $request->get('cp');
        $cliente->localidad = $request->get('localidad');
        $cliente->documento = $request->get('documento');
        $cliente->prefijo_celular = $request->get('prefijo');
        $cliente->numero_celular = $request->get('numTel');
        $cliente->activo = true;
        $cliente->password = bcrypt($cliente->nombre . $cliente->apellido);
        $cliente->assignRole('cliente');
        $cliente->save();

        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('gestion.clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $request->get('nombre');
        $cliente->apellido = $request->get('apellido');
        $cliente->codigo_postal = $request->get('cp');
        $cliente->localidad = $request->get('localidad');
        $cliente->documento = $request->get('documento');
        $cliente->prefijo_celular = $request->get('prefijo');
        $cliente->numero_celular = $request->get('numTel');
        $cliente->update();

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        try{
            $cliente->delete();
        }
        catch(QueryException $e){
            $cliente->activo = false;
            $cliente->update();
        }

        return redirect('/clientes');
    }
}
