@extends('adminlte::page')

@section('title', 'Detalles de Usuario')

@section('content_header')
    <h1>Detalles de Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        {{-- <td><strong>ID:</strong></td> --}}
                        {{-- <td>{{ $user->id }}</td> --}}
                    </tr>
                    <tr>
                        <td><strong>Nombre:</strong></td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Creación:</strong></td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Atrás</a>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
            </div>

        </div>
    </div>
@stop
