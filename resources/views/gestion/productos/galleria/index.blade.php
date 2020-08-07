@extends('gestion.layouts.app')

@section('content')
    <div class="container">
        <h2>Galerria de imagenes del producto {{$producto->codigo}}
            @include('gestion.productos.galleria.modal')
        </h2>
        <div class="row">
            @foreach ($imagenes as $imagen)
            <div class="col-md-3 mt-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img style="width:300px; height:200px; @if($imagen->principal)border: 5px solid #0080FF @endif;" src="{{ asset('/img/'.$imagen->nombre_imagen) }}" alt="Imagen no encotnrad" class="img-thumbnail">
                    </div>
                    <div class="panel-footer">
                        @if(!$imagen->principal)
                        <form action="{{ route('product.galeria.update', $imagen->nombre_imagen)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary btn-sm float-left">Principal</button>
                        </form>
                        @endif

                        <form action="{{ route('product.galeria.destroy', $imagen->nombre_imagen)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm float-right">Eliminar</button>
                        </form>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
