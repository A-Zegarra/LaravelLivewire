@extends('layouts.plantilla')
@section('title', 'Ventas')
@section('content')
    <h1>Pagina principal de Ventas</h1>
    <a href="{{ route('ventas.create') }}">Crear Venta</a>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Total Neto</th>
            <th>Total Impuestos </th>
            <th>Total Bruto</th>
            <th>Cliente</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($ventas as $venta)
            <tr>

                <td>{{ $venta->fecha }}</td>
                <td>{{ $venta->total_neto }}</td>
                <td>{{ $venta->total_impuestos }}</td>
                <td>{{ $venta->total_bruto }}</td>
                <td>{{ $venta->cliente->nombre }}</td>
                <td><a href="{{ route('ventas.show', $venta) }}">ver</a></td>
                <td><a href="{{ route('ventas.edit', $venta) }}">editar</a></td>

            </tr>
        @endforeach
    </table>
    {{ $ventas->links() }}
@endsection
