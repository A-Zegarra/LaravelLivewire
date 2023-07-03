@extends('layouts.plantilla')
@section('title', 'Detalle_Venta')
@section('content')
    <h1>Pagina principal de Detalle Venta</h1>
    <a href="{{ route('detalle_venta.create') }}">Crear Detalles Ventas</a>
    <table>
        <tr>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>SubTotal</th>
            <th>Impuestos</th>
            <th>Venta</th>
            <th>Producto</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($detalleventas as $detalleventa)
            <tr>

                <td>{{ $detalleventa->cantidad }}</td>
                <td>{{ $detalleventa->precio_unitario }}</td>
                <td>{{ $detalleventa->subtotal }}</td>
                <td>{{ $detalleventa->impuestos }}</td>
                <td>{{ $detalleventa->venta->total_bruto }}</td>
                <td>{{ $detalleventa->producto->descripcion }}</td>
                <td><a href="{{ route('detalle_importacion.show', $detalleventa) }}">ver</a></td>
                <td><a href="{{ route('detalle_importacion.edit', $detalleventa) }}">editar</a></td>

            </tr>
        @endforeach
    </table>
    {{ $detalleventas->links() }}
@endsection
