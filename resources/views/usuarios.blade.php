@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="ml-10 mr-10">
            <h2>Lista de usuarios registrados</h2>
            <table class="table table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                </thead>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
