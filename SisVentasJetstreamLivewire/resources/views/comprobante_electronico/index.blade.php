@extends('layouts.plantilla')
@section('title', 'Comprobantes')
@section('content')
    <h1>Pagina principal de Comprobantes</h1>
    <a href="{{ route('comprobante_electronico.create') }}">Crear Comprobantes</a>
    <table>
        <tr>
            <th>Serie</th>
            <th>Numero</th>
            <th>Fecha Emision </th>
            <th>Estado</th>
            <th>Venta</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($comprobanteelectronicos as $comprobanteelectronico)
            <tr>

                <td>{{ $comprobanteelectronico->serie }}</td>
                <td>{{ $comprobanteelectronico->numero }}</td>
                <td>{{ $comprobanteelectronico->fecha_emision }}</td>
                <td>{{ $comprobanteelectronico->estado }}</td>
                <td>{{ $comprobanteelectronico->venta->total_bruto }}</td>
                <td><a href="{{ route('comprobante_electronico.show', $comprobanteelectronico) }}">ver</a></td>
                <td><a href="{{ route('comprobante_electronico.edit', $comprobanteelectronico) }}">editar</a></td>

            </tr>
        @endforeach
    </table>

    {{ $comprobanteelectronicos->links() }}
@endsection
