@extends('gestion.layouts.app')

@section('content')
    <div class="container">
        <h2>Editar categoria: {{$categoria->nombre}}</h2>
        <form action="{{ route('categorias.update', $categoria->id)}}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la categoria" value="{{ $categoria->nombre}}">
                @error('nombre')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection
