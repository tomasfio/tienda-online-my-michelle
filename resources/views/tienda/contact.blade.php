@extends('tienda.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="contact-title">Dejanos tu mensaje</h2>
        </div>
        <div class="col-lg-8">
            <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'" placeholder="Ingrese nombre">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder="Ingrese email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="telefono" id="telefono" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telefono'" placeholder="Ingrese telefono">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Asunto'" placeholder="Ingrese asunto">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingrese mensaje'" placeholder=" Mensaje"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="col-3">
                        <button type="submit" class="btn btn-block btn-success">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 offset-lg-1">
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                    <h3>Ricardones, Santa Fe.</h3>
                    <p>San martin 1081</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                    <h3>+54 9 03476 15659995</h3>
                    <p>Lunes a viernes de 9am a 18</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                    <h3>molamodaydeco@gmail.com</h3>
                    <p>Envíanos tu consulta en cualquier momento</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-instagram"></i></span>
                <div class="media-body">
                    <h3>@mymichellemayorista</h3>
                    <p>Visita nuestro Instragram cuando quiera</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection