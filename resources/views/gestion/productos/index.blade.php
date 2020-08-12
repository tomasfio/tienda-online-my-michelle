@extends('gestion.layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>Lista de productos registrados
            <a href="productos/create"><button type="button" class="btn btn-success float-right">Agregar producto</button></a>
        </h2>
        <h6>
            @if ($search)
                <div class="alert alert-primary" role="alert">
                    Los resultado para la busqueda '{{$search}}' son:
                </div>
            @endif
            </h6>
            <table class="table table-hover">
                <thead>
                    <th>Imagen</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>¿Solo minorista?</th>
                    <th>¿Hay stock?</th>
                    <th>Subcategoria</th>
                    <th>Categoria</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                @foreach ($productos as $producto)
                    <tr>
                        <td>
                            @if ($producto->imagen_principal != null)
                            <img style="width:50px; height:50px;" src="{{ asset('/img/'.$producto->imagen_principal->nombre_imagen) }}" 
                            data-full="{{ asset('/img/'.$producto->imagen_principal->nombre_imagen) }}"
                            alt="Imagen no encotnrad" class="img-thumbnail">
                            @endif
                        </td>
                        <td>{{$producto->codigo}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->solo_minorista == 1 ? 'Solo minorista' : 'Para todos'}}</td>
                        <td>{{$producto->en_stock == 1 ? 'Si hay stock' : 'No hay stock '}}</td>
                        <td>{{$producto->subcategoria->nombre}}</td>
                        <td>{{$producto->subcategoria->categoria->nombre}}</td>
                        <td><a type="button" class="btn btn-info" href="{{ route('product.galleria.index', $producto->codigo) }}">Imagenes</a></td>
                        <td><a type="button" class="btn btn-warning" href="{{ route('productos.edit', $producto->codigo)}}" >Modificar</a></td>
                        <td>
                            <form action="{{ route('productos.destroy', $producto->codigo) }}" method="post" onsubmit="confirmDelete('{{$producto->codigo}}', this)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="row">
                <div class="mx-auto">
                    {{ $productos->links()}}
                </div>
            </div>
        </div>
    </div>

    @push('css')
    <style>
        #lightbox{
            box-shadow: 0 0 0 400px rgba(0,0,0,0.7);
            background: rgba(0,0,0,0.7) none 50% no-repeat;
            background-size: contain;
            -webkit-transition: 0.7s;
            transition: 0.7s;
            position: fixed;
            top: 0; left: 0;
            z-index: 1000;
            width: 90%; height: 90%;
            margin: 5%;
            opacity: 0;
            visibility: hidden;
        }   

        #lightbox.show{
            opacity: 1;
            visibility: visible;
        }

        #lightbox:after{
            content:"×";
            color:#fff;
            position:absolute;
            right: 10px; top: 10px;
            font-size: 30px;
            cursor: pointer;
        }
    </style>    
    @endpush

    @push('scripts')
    <script>
        let x = $(document);
        x.ready(inicializarEventos);

        function inicializarEventos() {
                var $lb = $("<div/>", {
                id: "lightbox",
                appendTo: "body",
                click :function() {
                $(this).removeClass("show");
                }
            });

            $("[data-full]").click(function(){
            $lb.css({backgroundImage:"url('"+$(this).data("full")+"')"}).addClass("show");
            });
        }

        function confirmDelete(producto, form){
            event.preventDefault();
            if(confirm("¿Desea borrar el producto " + producto + "?\n")){
                form.submit();
            }
        }
    </script>
    @endpush
@endsection
