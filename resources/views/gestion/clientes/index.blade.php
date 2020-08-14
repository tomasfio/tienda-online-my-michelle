@extends('gestion.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Lista de clientes registrados
                    <a href="clientes/create"><button class="btn btn-success float-right">Agregar cliente</button></a>
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
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Telefono celular</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <th>{{$cliente->nombre}}</th>
                                <th>{{$cliente->apellido}}</th>
                                <th>{{$cliente->email}}</th>
                                <th> +54 9 0{{$cliente->prefijo_celular}} 15{{$cliente->numero_celular}}</th>
                                <th><a type="button" href="{{ route('clientes.edit', $cliente->id)}}" class="btn btn-warning">Modificar</a></th>
                                <th>
                                <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post" onsubmit="confirmDelete('{{$cliente->nombre}}', '{{$cliente->apellido}}', this)">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="mx-auto">
                        {{ $clientes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(nombre, apellido, form){
            event.preventDefault();
            if(confirm("¿Desea borrar el cliente " + nombre + " " + apellido + "?")){
                form.submit();
            }
        }
    </script>
    @endpush
@endsection