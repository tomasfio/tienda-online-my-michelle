@extends('gestion.layouts.app')

@section('content')
    <div class="container">
        <h2>Resgistrar nuevo producto</h2>
        <form method="POST" action="{{ route('productos.update', $producto->codigo) }}">
            @method('PATCH')
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="codigo">Codigo</label>
                    <input type="text" class="form-control" name="cod_producto" value="{{$producto->codigo}}" placeholder="Ingrese codigo del producto" readonly>
                    @error('codigo')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="subcategorias">Subcategorias</label>
                    <select name="subcategoria" class="form-control">
                        @foreach ($subcategorias as $subc)
                            <option value="{{$subc->id}}" {{ $producto->subcategoria->id === $subc->id ? 'selected' : '' }}>{{$subc->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingrese descripcion del producto">{{$producto->descripcion}}</textarea>
                @error('descripcion')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="observacion">Observaciones</label>
                <textarea class="form-control" name="observacion" rows="3" placeholder="Ingrese observacion del producto">{{$producto->observacion}}</textarea>
                @error('observacion')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="precioMinorista">Precio minorista</label>
                    <input type="number" class="form-control" name="precioMinorista" placeholder="Ingrese precio minorista del producto..." step="0.01" value="{{$producto->precio_minorista}}">
                    @error('precioMinorista')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="precioMayorista">Precio mayorista</label>
                    <input type="number" class="form-control" name="precioMayorista" placeholder="Ingrese precio mayorista del producto..." step="0.01" value="{{$producto->precio_mayorista}}">
                    @error('precioMayorista')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="precioBlister">Precio blister</label>
                    <input type="number" class="form-control" name="precioBlister" placeholder="Ingrese precio blister del producto..." step="0.01" value="{{$producto->precio_blister}}">
                    @error('precioBlister')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="row pl-50">
                <div class="col-6 form-group form-check">
                    <input type="checkbox" class="form-check-input" name="solo_minorista" {{$producto->solo_minorista == 1 ? 'checked' : ''}}>
                    <label class="form-check-label" for="solo_minorista">¿Solo minorista?</label>
                </div>
                <div class="col-6 form-group form-check">
                    <input type="checkbox" class="form-check-input" name="hay_stock" {{$producto->en_stock == 1 ? 'checked' : ''}}>
                    <label class="form-check-label" for="hay_stock">Hay stock</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection
