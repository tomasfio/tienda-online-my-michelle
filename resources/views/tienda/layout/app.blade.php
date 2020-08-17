<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    @stack('css')
</head>

<body>
    
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('dist/img/logo/logo.jpg')}}" style="width: 75px;height:75px;" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->

<?php use App\Categoria; $categorias = Categoria::all() ?>

<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{ asset('dist/img/logo/logo.jpg')}}" style="width: 100px;height:100px;" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>                                                
                                    <ul id="navigation">                                                                                                                                     
                                        <li><a href="{{url('/')}}">Inicio</a></li>
                                        <li><a href="">Productos</a></li>
                                        <li><a href="#">Categorias</a>
                                            <ul class="submenu">
                                                @foreach ($categorias as $categoria)
                                                <li><a href=""> {{$categoria->nombre}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contactenos</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div> 
                        <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                <li class="d-none d-xl-block">
                                    <div class="form-box f-right ">
                                        <input type="text" name="Search" placeholder="Buscar producto">
                                        <div class="search-icon">
                                            <i class="fas fa-search special-tag"></i>
                                        </div>
                                    </div>
                                </li>
                                <!--<li>
                                    <div class="shopping-card">
                                        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </li>-->
                                <li class="d-none d-lg-block"> <a href="#" class="btn header-btn">Iniciar sesion</a></li>
                            </ul>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<main>
    <section class="section-padding30">
        @yield('content')
    </section>
</main>

<footer>
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Enlaces rapidos</h4>
                            <ul>
                                <li><a href="#"> Productos</a></li>
                                <li><a href="#"> Contactenos</a></li>
                                <li><a href="#"> Iniciar sesion</a></li>
                                <li><a href="#"> Registrarse</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-8">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Categorias</h4>
                            <ul>
                                @foreach ($categorias as $categoria)
                                <li><a href="#">{{$categoria->nombre}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Datos de contactos</h4>
                            <ul>
                             <li></li>
                             <li></li>
                             <li></li>
                             <li></li>
                             <li></li>
                         </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row">
             <div class="col-xl-7 col-lg-7 col-md-7">
                 <div class="footer-copy-right">
                     <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                   </div>
             </div>
              <div class="col-xl-5 col-lg-5 col-md-5">
                 <div class="footer-copy-right f-right">
                     <!-- social -->
                     <div class="footer-social">
                         <a href="#"><i class="fab fa-twitter"></i></a>
                         <a href="#"><i class="fab fa-facebook-f"></i></a>
                         <a href="#"><i class="fab fa-instagram"></i></a>
                         <a href="#"><i class="fab fa-whatsapp"></i></a>
                     </div>
                 </div>
             </div>
         </div>
        </div>
    </div>
</footer>

<!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('/assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('/assets/js/contact.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/assets/js/mail-script.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins.js')}}"></script>
    <script src="{{asset('/assets/js/main.js')}}"></script>
    
    @stack('scripts')
</body>
</html>