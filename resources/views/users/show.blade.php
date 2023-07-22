@extends('adminlte::page')

@section('title', 'Detalles de Usuario')

@section('content_header')
    <h1>Detalles de Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Creación:</strong> {{ $user->created_at->diffForHumans() }}</p>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
@stop
