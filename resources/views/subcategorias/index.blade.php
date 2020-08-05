@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Lista de subcategorias registradas
                    <a href="subcategorias/create"><button class="btn btn-success float-right">Agregar subcategoria</button></a>
                </h2>
                <h6>
                    @if ($search)
                    <div class="alert alert-primary" role="alert">
                        Los resultado para la busqueda '{{$search}}' son:
                    </div>
                    @endif
                </h6>

                <table class="table table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($subcategorias as $subc)
                        <tr>
                            <th>{{$subc->id}}</th>
                            <th>{{$subc->nombre}}</th>
                            <th>{{$subc->categoria->nombre}}</th>
                            <th><a type="button" class="btn btn-warning" href="{{ route('subcategorias.edit', $subc->id)}}">Modificar</a></th>
                            <th>
                                <form action="{{ route('subcategorias.destroy', $subc->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="mx-auto">
                        {{ $subcategorias->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
