@extends('layouts.plantilla')
@section('title', 'Productos')
@section('content')
    <h1>Pagina principal de Productos</h1>
    <a href="{{ route('productos.create') }}">Crear Producto</a>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Caja</th>
            <th>Costo</th>
            <th>Menor</th>
            <th>Mayor</th>
            <th>Medida</th>
            <th>Foto</th>
            <th>Categoria</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($productos as $producto)
            <tr>

                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->cantidad_caja }}</td>
                <td>{{ $producto->costo }}</td>
                <td>{{ $producto->precio_menor }}</td>
                <td>{{ $producto->precio_mayor }}</td>
                <td>{{ $producto->tipo_medida }}</td>
                <td> <img src="{{ $producto->foto }}" alt="Foto" width="70px"> </td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td><a href="{{ route('productos.show', $producto) }}">ver</a></td>
                <td><a href="{{ route('productos.edit', $producto) }}">editar</a></td>

            </tr>
        @endforeach
    </table>
    {{ $productos->links() }}
@endsection
