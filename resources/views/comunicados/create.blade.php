@extends('adminlte::page')

@section('title', 'Crear Comunicado')

@section('content_header')
    <h1>Crear Comunicado</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('comunicados.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea class="form-control" id="contenido" name="contenido" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Crear Comunicado</button>
            </form>
        </div>
    </div>
@stop
