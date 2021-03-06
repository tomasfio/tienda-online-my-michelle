@extends('gestion.layouts.app')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{ route('productos.update', $producto->codigo) }}" autocomplete="off">
            <h2>Resgistrar nuevo producto
                <button type="submit" class="btn btn-primary float-right">Guardar cambios</button>
            </h2>
            <hr>
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-8">
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
                        <div class="form-group col-md-6">
                            <label for="precioMinorista">Precio minorista</label>
                            <input type="number" class="form-control" name="precioMinorista" placeholder="Ingrese precio minorista del producto..." step="0.01" value="{{$producto->precio_minorista}}">
                            @error('precioMinorista')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precioMayorista">Precio mayorista</label>
                            <input type="number" class="form-control" name="precioMayorista" placeholder="Ingrese precio mayorista del producto..." step="0.01" value="{{$producto->precio_mayorista}}">
                            @error('precioMayorista')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cantidadBlister">Cantidad del blister</label>
                            <input type="number" class="form-control" name="cantidadBlister" placeholder="Ingrese cantidad de productos del blister..." min="1" value="{{$producto->cantidad_blister}}">
                            @error('cantidadBlister')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
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
                </div>

                <div class="col-4" id="POItablediv">
                    <button type="button" class="btn btn-success mb-1 float-right" id="addmorePOIbutton" value="Add More POIs" onclick="insRow()">Agregar opcion</button>
                    <table class="table table-hover table-sm" id="POITable">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Stock</td>
                                <td>¿Eliminar opcion?</td>
                            </tr>
                        </thead>
                      <tbody>
                            <?php $i = 0; ?>
                            @foreach ($opciones_producto as $opcion)
                                <tr>
                                    <input type="hidden" name="idOpcionUpdate[{{$i}}]" value="{{$opcion->id}}">
                                    <td><input class="form-control form-control-sm" type="text" name="nombreOpc[{{$i}}]" id="nombreOpc[{{$i}}]" placeholder="Ingres nombre opcion..." value="{{$opcion->nombre_opcion}}" required/></td>
                                    <td><input class="form-control form-control-sm" type="checkbox" name="stockOpc[{{$i}}]" id="stockOpc[{{$i}}]" @if ($opcion->stock_opcion) checked @endif></td>
                                    <td><input class="form-control form-control-sm" type="checkbox" name="eliminarOpc[{{$i}}]" id="eliminarOpc[{{$i}}]"></td>
                                </tr>
                            <?php $i++ ?>
                            @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        function deleteRow(row)
        {
            event.preventDefault();
            $(row).closest('tr').remove();

            var x = $('#POITable > tbody > tr');
            var i = 0;

            x.each(function(){
                var id1 = 'nombreOpc[' + i + ']';
                var id2 = 'stockOpc[' + i + ']';
                $(this).find('td:eq(0) > input:first-child').attr('id', id1).attr('name', id1);
                $(this).find('td:eq(1) > input:first-child').attr('id', id2).attr('name', id2);
                i++;
            });
        }
        
        
        function insRow()
        {
            event.preventDefault();
            var x= $('#POITable > tbody:last-child');
            
            var len = $('#POITable > tbody >tr').length; 
            console.log(len);

            var new_row = '<tr>';
            new_row += '<td><input class="form-control form-control-sm" type="text" name="nombreOpc" id="nombreOpc" placeholder="Ingres nombre opcion..." required/></td>'
            new_row += '<td><input type="checkbox" class="form-control form-control-sm" name="stockOpc" id="stockOpc" checked></td>'
            new_row += '<td><button class="btn btn-danger btn-sm" id="delPOIbutton" value="Delete" onclick="deleteRow(this)">Eliminar</button></td></tr>'
            $('#POITable > tbody').append(new_row);
            
            var row = $('#POITable > tbody:last-child > tr:last-child');
            
            console.log(row);

            var inp1 = row.find('td:eq(0) > input:first-child');
            var id1 = 'nombreOpc[' + len + ']';

            inp1.attr('id', id1);
            inp1.attr('name', id1);
            inp1.text('');
        
            var inp2 = row.find('td:eq(1) > input:first-child');
            var id2 = 'stockOpc[' + len + ']';

            inp2.attr('id', id2);
            inp2.attr('name', id2);
            inp2.prop( "checked", true )
        }
    </script>
    @endpush
@endsection
