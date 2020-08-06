@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de productos registrados
            <a href="productos/create"><button type="button" class="btn btn-success float-right">Agregar producto</button></a>
        </h2>
        <table class="table table-hover">
            <thead>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>¿Solo minorista?</th>
                <th>¿Hay stock?</th>
                <th>Subcategoria</th>
                <th>Categoria</th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->codigo}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->solo_minorista == 1 ? 'Solo minorista' : 'Para todos'}}</td>
                    <td>{{$producto->en_stock == 1 ? 'Si hay stock' : 'No hay stock '}}</td>
                    <td>{{$producto->subcategoria->nombre}}</td>
                    <td>{{$producto->subcategoria->categoria->nombre}}</td>
                    <td><a type="button" class="btn btn-warning" href="{{ route('productos.edit', $producto->codigo)}}" >Modificar</a></td>
                    <td><a type="button" class="btn btn-danger">Eliminar</a></td>
                    <td><a type="button" class="btn btn-info" href="{{ route('product.galleria.index', $producto->codigo) }}">Imagenes</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
