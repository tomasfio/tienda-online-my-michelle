@extends('gestion.layouts.app')

@section('content')
    <div class="container">
        <h2>Registrar nueva subcategoria</h2>
        <form action="/subcategorias" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la subcategoria" value="{{old('nombre')}}" required>
                @error('nombre')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select class="form-control" name="categoria">
                    @foreach ($categorias as $cat)
                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Imagen subcategoria</label>
                <input name="imagen" type="file" class="form-control">
                @error('imagen')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection
