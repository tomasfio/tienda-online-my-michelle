@extends('gestion.layouts.app')

@section('content')
    <div class="container">
        <h2>Registrar nueva categoria</h2>
        <form action="/categorias" method="post" autocomplete="off">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la categoria" required>
                @error('nombre')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection
