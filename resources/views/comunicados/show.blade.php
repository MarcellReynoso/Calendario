@extends('adminlte::page')

@section('title', 'Detalles de comunicado')

@section('content_header')
    <h1>Detalles de comunicado</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $comunicado->id }}</p>
            <p><strong>Nombre:</strong> {{ $comunicado->titulo }}</p>
            <p><strong>Creación:</strong> {{ $comunicado->created_at->diffForHumans() }}</p>
            <a href="{{ route('comunicados.edit', $comunicado->id) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('admin.comunicados', $comunicado->id) }}" class="btn btn-primary">Atrás</a>
        </div>
    </div>
@stop
