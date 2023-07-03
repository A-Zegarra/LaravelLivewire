@extends('layouts.plantilla')
@section('title', 'Importacion')
@section('content')
    <h1>Pagina principal de Importacion</h1>
    <a href="{{ route('importacion.create') }}">Crear Detalles Importacion</a>
    <table>
        <tr>
            <th>Fecha Importacion</th>
            <th>Total Gasto</th>
            <th>Proveedor</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($importacions as $importacion)
            <tr>

                <td>{{ $importacion->fecha_importacion }}</td>
                <td>{{ $importacion->total_gasto }}</td>
                <td>{{ $importacion->proveedor->nombre }}</td>
                <td><a href="{{ route('importacion.show', $importacion) }}">ver</a></td>
                <td><a href="{{ route('importacion.edit', $importacion) }}">editar</a></td>

            </tr>
        @endforeach
    </table>
    {{ $importacions->links() }}
@endsection
