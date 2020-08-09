@extends('gestion.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Lista de categorias registradas
                    <a href="categorias/create"><button class="btn btn-success float-right">Agregar categoria</button></a>
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
                        <th>Id</th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $cat)
                        <tr>
                            <th>{{$cat->id}}</th>
                            <th>{{$cat->nombre}}</th>
                            <th><a type="button" class="btn btn-warning" href="{{ route('categorias.edit', $cat->id)}}">Modificar</a></th>
                            <th>
                                <form action="{{ route('categorias.destroy', $cat->id)}}" method="post" onsubmit="confirmDelete('{{$cat->nombre}}', this)">
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
                        {{ $categorias->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(categoria, form){
            event.preventDefault();
            if(confirm("¿Desea borrar la categoria " + categoria + "?\nRecuerde que si borrar la categoria, se borraran todas las sbucategorias y productos relaciondos")){
                form.submit();
            }
        }
    </script>
    @endpush
@endsection
