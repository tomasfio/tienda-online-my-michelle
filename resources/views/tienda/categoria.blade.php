@extends('tienda.layout.app')

@section('content')

<section class="category-area">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="section-tittle mb-30">
                    <h2>Subcategorias de {{$categoria->nombre}}</h2>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6"></div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @foreach ($categoria->subcategorias as $subcategoria)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-category mb-30">
                            <a href="{{url("/subcategoria/$subcategoria->nombre")}}" class="link">
                                <div class="category-img">
                                    @if ($subcategoria->nombre_imagen != null)
                                    <img src="{{ asset('/img/'.$subcategoria->nombre_imagen) }}" alt="Imagen no encontrada" />
                                    @endif
                                    <div class="category-caption">
                                        <h2>{{$subcategoria->nombre}}</h2>
                                    </div>
                                </div>
                            </a>
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