@extends('gestion.layouts.app')

@section('content')
    <div class="container">
        <h2>Editar subcategoria: {{$subcategoria->nombre}}</h2>
        <form action="{{ route('subcategorias.update', $subcategoria->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la subcategoria" value="{{ $subcategoria->nombre}}">
                @error('nombre')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select class="form-control" name="categoria">
                    @foreach ($categorias as $cat)
                        <option value="{{$cat->id}}" {{ $subcategoria->categoria->id === $cat->id ? 'selected' : '' }}>{{$cat->nombre}}</option>
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

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection
