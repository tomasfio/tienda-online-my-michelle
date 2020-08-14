@extends('gestion.layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{route('clientes.update', $cliente->id)}}" method="post">
            <h2>Editar cliente: {{$cliente->apellido}}, {{$cliente->nombre}}
                <button type="submit" class="btn btn-primary float-right">Guardar cambios</button>
            </h2>
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-row mb-3">
                        <label for="email">Correo electronico</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese correo electronico..." value="{{$cliente->email}}" readonly>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del cliente..." value="{{$cliente->nombre}}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido"  id="apellido" class="form-control" placeholder="Ingrese apellido del cliente..." value="{{$cliente->apellido}}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="cp">Codigo postal</label>
                            <input type="text" name="cp" id="cp" class="form-control" placeholder="Ingrese codigo postal..." value="{{$cliente->codigo_postal}}">
                        </div>
                        <div class="form-group col-6">
                            <label for="localidad">Localidad</label>
                            <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Ingrese localidad..." value="{{$cliente->localidad}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="documento">Documento</label>
                            <input type="text" name="documento" id="documento" class="form-control" placeholder="Ingrese numero de dni.." value="{{$cliente->documento}}">
                        </div>
                        <div class="form-group col-6">
                            <label for="cel">Celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+54 9 0</span>
                                </div>
                                <input type="tel" name="prefijo" id="prefijo" class="form-control" value="{{$cliente->prefijo_celular}}" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">15</span>
                                </div>
                                <input type="tel" name="numTel" id="numTel" class="form-control" value="{{$cliente->numero_celular}}" required>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>    
@endsection