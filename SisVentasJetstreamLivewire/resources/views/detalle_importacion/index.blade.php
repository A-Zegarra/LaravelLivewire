@extends('layouts.plantilla')
@section('title', 'Detalle_Importacion')
@section('content')
    <h1>Pagina principal de Detalle Importacion</h1>
    <a href="{{ route('detalle_importacion.create') }}">Crear Detalles Importacion</a>
    <table>
        <tr>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Importacion</th>
            <th>Producto</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($detalleimportaciones as $detalleimportacion)
            <tr>

                <td>{{ $detalleimportacion->cantidad }}</td>
                <td>{{ $detalleimportacion->costo_unitario }}</td>
                <td>{{ $detalleimportacion->importacion->total_gasto }}</td>
                <td>{{ $detalleimportacion->producto->descripcion }}</td>
                <td><a href="{{ route('detalle_importacion.show', $detalleimportacion) }}">ver</a></td>
                <td><a href="{{ route('detalle_importacion.edit', $detalleimportacion) }}">editar</a></td>

            </tr>
        @endforeach
    </table>
    {{ $detalleimportaciones->links() }}
@endsection
