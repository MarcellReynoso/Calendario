@extends('adminlte::page')

@section('title', 'Comunicados')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Comunicados</h1>
        <a href="{{ route('comunicados.create') }}" class="btn btn-primary">Crear Comunicado</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @foreach ($comunicados as $comunicado)
                <div class="card mb-3">
                    <div class="card-body">
                        <h4><strong>{{ $comunicado->titulo }}</strong></h4>
                        <p class="card-text">{{ $comunicado->contenido }}</p>
                        {{-- <p class="card-text">
                            <small class="text-muted">Publicado {{ $comunicado->created_at->diffForHumans() }}</small>
                        </p> --}}
                    </div>
                    <div class="card-footer">
                        {{ $comunicado->user->name }} </p><!-- Mostrar nombre del usuario -->
                        {{ $comunicado->created_at->format('d/m/Y H:i') }} </p> <!-- Mostrar fecha y hora de publicación -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop



