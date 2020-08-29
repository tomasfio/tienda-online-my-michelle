@extends('tienda.layout.app')

@section('content')
<section class="latest-product-area padding-bottom">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="section-tittle mb-15">
                    <h4>Producto {{$producto->descripcion}}</h4>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6">
                <div class="section-tittle mb-15 float-right">
                    <h4>
                        <a href="{{url('/')}}">Inicio</a>
                        <i class="fas fa-arrow-right"></i>
                        <a href="{{url('/categoria/' . $producto->subcategoria->categoria->nombre)}}">{{$producto->subcategoria->categoria->nombre}}</a>
                        <i class="fas fa-arrow-right"></i>
                        <a href="{{url('/subcategoria/' . $producto->subcategoria->nombre)}}">{{$producto->subcategoria->nombre}}</a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="single-product mb-60">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-7 mb-5">
                            <div id="carouselFotos" class="carousel slide" data-ride="carousel" data-interval="false">
                                <div class="carousel-inner">
                                    @foreach ($producto->imagenes as $imagen)
                                        <div class="carousel-item @if($imagen->principal) active @endif">
                                            <img src="{{ asset('/img/'.$imagen->nombre_imagen) }}" class="w-100" alt="">
                                        </div>
                                    @endforeach 
                                </div>
                                <a class="carousel-control-prev" href="#carouselFotos" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselFotos" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-5">
                            <div class="float-left text-left product-detail">
                                <h4>Codigo del producto: {{$producto->codigo}}</h4>
                                <h5 class="mt-2">Descripcion: <br>{{$producto->descripcion}}</h5>
                                <h5 class="mt-2">Observacion: <br>{{$producto->observacion}}</h5>
                                <div class="price mt-2">
                                    <ul>
                                        <li>Precio mayorista: ${{$producto->precio_mayorista}}</li>
                                        @if($producto->cantidad_blister != null && $producto->precio_blister != null)
                                        <li>Precio por blister: ${{$producto->precio_blister}} por {{$producto->cantidad_blister}} unidades</li>
                                        @endif
                                    </ul>
                                </div>

                                @if(count($opciones))
                                <div class="option-detail mt-2">
                                    <h5>Opciones de producto</h5>
                                    <ul class="unordered-list">
                                        @foreach ($opciones as $opcion)
                                        <li>{{$opcion->nombre_opcion}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@push('css')
    <style>
        .w-100 {
            width: 100% !important;
            height: 60vh;
        }

        .product-detail h4 {
            color: #000;
            font-size: 32px;
            line-height: 1;
        }

        .product-detail h5 {
            color: #000;
            font-size: 18px;
        }

        .option-detail h5 {
            color: #000;
            font-size: 24px;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .product-detail h4{
                font-size: 24px;
            }

            .option-detail h5 {
                font-size: 20px;
            }

            .product-detail h5{
                font-size: 16px;
            }
        }

        @media (max-width: 767px) {
            /* line 96, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_category.scss */
            .product-detail h4 {
                font-size: 22px;
            }

            .option-detail h5 {
                font-size: 18px;
            }

            .product-detail h5{
                font-size: 14px;
            }
        }
    </style>
@endpush
@endsection