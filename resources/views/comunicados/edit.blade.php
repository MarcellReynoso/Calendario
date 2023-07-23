@extends('adminlte::page')

@section('title', 'Editar comunicado')

@section('content_header')
    <h1>Editar Comunicado</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('comunicados.update', $comunicado->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $comunicado->titulo }}" required>
                </div>
                <div class="mb-3">
                    <label for="contenido" class="form-label">Contenido</label>
                    <input type="text" class="form-control" id="contenido" name="contenido" value="{{ $comunicado->contenido }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@stop