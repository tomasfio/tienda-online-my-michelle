@extends('gestion.layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="/clientes" method="post">
            <h2>Resgistrar nuevo cliente
                <button type="submit" class="btn btn-primary float-right">Registrar</button>
            </h2>
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-row mb-3">
                        <label for="email">Correo electronico</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese correo electronico..." required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del cliente..." required>
                        </div>
                        <div class="form-group col-6">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido"  id="apellido" class="form-control" placeholder="Ingrese apellido del cliente..." required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="cp">Codigo postal</label>
                            <input type="text" name="cp" id="cp" class="form-control" placeholder="Ingrese codigo postal...">
                        </div>
                        <div class="form-group col-6">
                            <label for="localidad">Localidad</label>
                            <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Ingrese localidad...">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="documento">Documento</label>
                            <input type="text" name="documento" id="documento" class="form-control" placeholder="Ingrese numero de dni..">
                        </div>
                        <div class="form-group col-6">
                            <label for="cel">Celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+54 9 0</span>
                                </div>
                                <input type="tel" name="prefijo" id="prefijo" class="form-control" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">15</span>
                                </div>
                                <input type="tel" name="numTel" id="numTel" class="form-control" required>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>    
@endsection