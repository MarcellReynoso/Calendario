@extends('adminlte::page')

@section('title', 'Comunicados')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@stop

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Lista de comunicados</h1>
        <a href="{{ route('comunicados.create') }}" class="btn btn-primary">Crear Comunicado</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped" id="usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tìtulo</th>
                        <th>Contenido</th>
                        <th>Creación</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comunicados as $comunicado)
                        <tr>
                            <td>{{ $comunicado->id }}</td>
                            <td>{{ $comunicado->titulo }}</td>
                            <td>{{ $comunicado->contenido }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                @can('comunicados.show')
                                <a href="{{ route('comunicados.show', $comunicado->id) }}" class="btn btn-info btn-sm">Ver</a>
                                @endcan

                                @can('comunicados.edit')
                                <a href="{{ route('comunicados.edit', $comunicado->id) }}" class="btn btn-primary btn-sm">Editar</a>  
                                @endcan

                                @can('comunicados.destroy')
                                <form action="{{ route('comunicados.destroy', $comunicado->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                                </form> 
                                @endcan 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        new DataTable('#usuarios', {
        
        responsive: true,
        autoWidth: false,

        "language": {
            "lengthMenu": "Mostrar " + 
            "<select class= 'custom-select custom-select-sm form-control form-control-sm' ><option value='10'>10</option><option value='25'>25</option><option value='50'>50</option><option value='100'>100</option><option value='-1'>Todos</option></select>" +" registros por página",
            "zeroRecords": "No se encontró nada",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay información disponible",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "next" : "Siguiente",
                "previous" : "Anterior"
            }
        }

        });
    </script>
@stop
