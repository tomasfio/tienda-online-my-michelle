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
                <th></th>
                <th></th>
                <th></th>
            </thead>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->cod_producto}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->solo_minorista}}</td>
                    <td>{{$producto->en_stock}}</td>
                    <td><a type="button" class="btn btn-warning" href="{{ route('productos.edit', $producto->cod_producto)}}" >Modificar</a></td>
                    <td><a type="button" class="btn btn-danger">Eliminar</a></td>
                    <td><a type="button" class="btn">Ver</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
