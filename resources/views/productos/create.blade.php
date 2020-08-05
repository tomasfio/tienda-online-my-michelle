@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Resgistrar nuevo producto</h2>
        <form method="POST" action="/productos">
            @csrf
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" class="form-control" name="codigo" placeholder="Ingrese codigo del producto">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingrese descripcion del producto"></textarea>
            </div>
            <div class="form-group">
                <label for="observacion">Observaciones</label>
                <textarea class="form-control" name="observacion" rows="3" placeholder="Ingrese observacion del producto"></textarea>
            </div>
            <div class="form-group">
                <label for="subcategorias">Subcategorias</label>
                <select name="subcategoria" class="form-control">
                    @foreach ($subcategorias as $subc)
                        <option value="{{$subc->id}}">{{$subc->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-3 form-group form-check">
                    <input type="checkbox" class="form-check-input" name="solo_minorista">
                    <label class="form-check-label" for="solo_minorista">¿Solo minorista?</label>
                </div>
                <div class="col-3 form-group form-check">
                    <input type="checkbox" class="form-check-input" name="hay_stock">
                    <label class="form-check-label" for="hay_stock">Hay stock</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection
