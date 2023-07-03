@extends('layouts.plantilla')
@section('title', 'Movimiento')
@section('content')
    <h1>Pagina principal de Movimiento</h1>
    <a href="{{ route('movimiento.create') }}">Crear Movimiento</a>
    <table>
        <tr>
            <th>Tipo movimiento</th>
            <th>Cantidad</th>
            <th>Fecha movimiento</th>
            <th>Producto</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($movimientos as $movimiento)
            <tr>

                <td>{{ $movimiento->tipo_movimiento }}</td>
                <td>{{ $movimiento->cantidad }}</td>
                <td>{{ $movimiento->fecha_movimiento }}</td>
                <td>{{ $movimiento->producto->descripcion }}</td>
                <td><a href="{{ route('movimiento.show', $movimiento) }}">ver</a></td>
                <td><a href="{{ route('movimiento.edit', $movimiento) }}">editar</a></td>

            </tr>
        @endforeach

    </table>
    {{ $movimientos->links() }}
@endsection
