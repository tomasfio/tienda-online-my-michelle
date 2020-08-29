@extends('tienda.layout.app')

@section('content')

<div class="slider-area mb-30">
    <div class="slider-active">
        <div class="single-slider slider-height2 d-flex align-items-center" >
            <div class="container">
                <div id="myCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item text-center active">
                            <h1>
                                ¡Bienvenido a <span class="format-nombre">My Michelle</span><br> accesorios !
                            </h1>
                            <p>
                                Proximamnete la pagina tendra carrito para que pueda hacer sus compras de manera comoda online.<br>Esta disponible nuestro catalogo de producto para que lo vea.
                            </p>
                        </div>
                        <div class="carousel-item text-center">
                            <h1>
                                Segunda mensaje
                                <br>
                            </h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.<br> Quibusdam exercitationem officiis fugit eos nostrum optio voluptate vero, possimus quae molestiae aut,<br>non, expedita adipisci voluptatem ipsa! Assumenda repellendus veritatis cupiditate.</p>
                        </div>
                        <div class="carousel-item text-center">
                            <h1>
                                Tercer mensaje
                                <br>
                            </h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.<br> Quibusdam exercitationem officiis fugit eos nostrum optio voluptate vero, possimus quae molestiae aut,<br> non, expedita adipisci voluptatem ipsa! Assumenda repellendus veritatis cupiditate.</p>
                        </div>
                    </div>
                    
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev" style="left: 36px;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                      </a>
                      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next" >
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                      </a>

                    <ol id="my-carousel-indicators" class="carousel-indicators" style="position: relative; bottom: -36px;">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="latest-product-area padding-bottom">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="section-tittle mb-30">
                    <h2>Productos mas vendidos</h2>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6"></div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @foreach ($productos_mas_vendidos as $producto)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-product mb-60">
                            <div class="product-img">
                                @if ($producto->imagen_principal != null)
                                <a href="{{url("/producto/$producto->codigo")}}" class="link">
                                    <img src="{{ asset('/img/'.$producto->imagen_principal->nombre_imagen) }}">
                                    @if($producto->nuevo()) 
                                    <div class="new-product">
                                        <span>Nuevo</span>
                                    </div>
                                    @endif
                                </a>
                                @endif
                                </div>
                                <div class="product-caption">
                                    <h6>{{$producto->subcategoria->categoria->nombre}} / {{$producto->subcategoria->nombre}}</h6>
                                    <h4><a href="{{url("/producto/$producto->codigo")}}">{{$producto->descripcion}}</a></h4>
                                    <div class="price">
                                        <ul>
                                            <li>${{$producto->precio_mayorista}}</li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest-product-area padding-bottom">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="section-tittle mb-30">
                    <h2>Novedades</h2>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6"></div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @foreach ($productos_mas_nuevos as $producto)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-product mb-60">
                            <div class="product-img">
                                @if ($producto->imagen_principal != null)
                                <a href="{{url("/producto/$producto->codigo")}}" class="link">
                                    <img src="{{ asset('/img/'.$producto->imagen_principal->nombre_imagen) }}">
                                    @if($producto->nuevo()) 
                                    <div class="new-product">
                                        <span>Nuevo</span>
                                    </div>
                                    @endif
                                </a>
                                @endif
                                </div>
                                <div class="product-caption">
                                    <h6>{{$producto->subcategoria->categoria->nombre}} / {{$producto->subcategoria->nombre}}</h6>
                                    <h4><a href="{{url("/producto/$producto->codigo")}}">{{$producto->descripcion}}</a></h4>
                                    <div class="price">
                                        <ul>
                                            <li>${{$producto->precio_mayorista}}</li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


    @push('css')
        <style>
            .format-nombre {
                font-family: "Yellowtail", cursive;
                display: inline-block;
            }

            .link{
                width: 100%;
                height: 100%;
            }

            #my-carousel-indicators > li {
                border-radius: 12px;
                width: 12px;
                height: 12px;
            }

            .carousel-item {
                height: 250px;
            }

            @media (max-width: 767px) {
                .carousel-item {
                    height: 275px;
                }
            }

        </style>
    @endpush
@endsection