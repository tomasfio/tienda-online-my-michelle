@extends('tienda.layout.app')

@section('content')
<section class="latest-product-area padding-bottom">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="section-tittle mb-30">
                    <h2>Productos de {{$subcategoria->nombre}}</h2>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6"></div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @foreach ($productos as $producto)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-product mb-60">
                            <div class="product-img">
                                @if ($producto->imagen_principal != null)
                                <a href="{{url("/producto/$producto->codigo")}}" class="link">
                                    <img src="{{ asset('/img/'.$producto->imagen_principal->nombre_imagen) }}"  class="borderimg">
                                    @if($producto->nuevo()) 
                                    <div class="new-product">
                                        <span>Nuevo</span>
                                    </div>
                                    @endif
                                </a>
                                @endif
                                <div class="product-caption">
                                    <h4><a href="{{url("/producto/$producto->codigo")}}">{{$producto->descripcion}}</a></h4>
                                    <div class="price">
                                        <ul>
                                            <li>${{$producto->precio_mayorista}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mx-auto">
                {{ $productos->links()}}
            </div>
        </div>
    </div>
</section>

    @push('css')
        <style>
            .link{
                width: 100%;
                height: 100%;
            }

            .borderimg{
                width: 100%;
                height: 40vh;
            }
        </style>
    @endpush
@endsection