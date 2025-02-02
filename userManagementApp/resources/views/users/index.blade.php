@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Usuarios</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Puedes agregar botones para editar o eliminar usuarios aquí -->
                        <a href="#" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
