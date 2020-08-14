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
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese correo electronico..." autocomplete="off" value="{{old('email')}}" required>
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del cliente..." autocomplete="off" value="{{old('nombre')}}" required>
                            @error('nombre')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido"  id="apellido" class="form-control" placeholder="Ingrese apellido del cliente..." autocomplete="off" value="{{old('apellido')}}" required>
                            @error('apellido')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="cp">Codigo postal</label>
                            <input type="text" name="cp" id="cp" class="form-control" placeholder="Ingrese codigo postal..." value="{{old('cp')}}">
                            @error('cp')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="localidad">Localidad</label>
                            <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Ingrese localidad..." value="{{old('localidad')}}">
                            @error('localidad')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="documento">Documento</label>
                            <input type="text" name="documento" id="documento" class="form-control" placeholder="Ingrese numero de dni.." value="{{old('documento')}}" autocomplete="off">
                            @error('documento')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="cel">Celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+54 9 0</span>
                                </div>
                                <input type="tel" name="prefijo" id="prefijo" class="form-control" value="{{old('prefijo')}}" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">15</span>
                                </div>
                                <input type="tel" name="numTel" id="numTel" class="form-control" autocomplete="off" value="{{old('numTel')}}" required>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    @error('prefijo')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    @error('numTel')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>    
@endsection