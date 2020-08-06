@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Galerria de imagenes del producto {{$producto->codigo}}
            @include('productos.galleria.modal')
        </h2>
        <div class="row">
            @foreach ($imagenes as $imagen)
            <div class="col-md-3 mt-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img style="width:300px; height:200px" src="{{ asset('/img/'.$imagen->nombre_imagen) }}" alt="Imagen no encotnrad" class="img-thumbnail">
                    </div>
                    <div class="panel-footer">
                        <form action="{{ route('product.galeria.destroy', $imagen->nombre_imagen)}}"
                            method="post">
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-danger btn-sm float-right">Eliminar</button>
                        </form>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
