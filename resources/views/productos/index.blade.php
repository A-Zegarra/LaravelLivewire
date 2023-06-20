@extends('layouts.plantilla')
@section('title', 'Productos')
@section('content')
    <h1>Pagina principal de productos</h1>
    <a href="{{ route('productos.create') }}">Crear Producto</a>
    <table>
        <tr>
            <th>Descripcion</th>
            <th>Codigo</th>
            <th>Caja</th>
            <th>Costo</th>
            <th>Menor</th>
            <th>Mayor</th>
            <th>Origen</th>
            <th>Imagen</th>
            <th>Categoria</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($productos as $producto)
            <tr href="{{ route('productos.show', $producto->id) }}">
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->codigo }} </td>
                <td>{{ $producto->caja }} </td>
                <td>{{ $producto->costo }} </td>
                <td>{{ $producto->precioMenor }} </td>
                <td>{{ $producto->precioMayor }} </td>
                <td>{{ $producto->origen }} </td>
                <td><img src="{{ $producto->imagen }}"></td>
                <td>{{ $producto->id_categoria }} </td>
                <td><a href="{{ route('productos.show', $producto) }}">ver</a></td>
                <td><a href="{{ route('productos.edit', $producto) }}">editar</a></td>
            </tr>
        @endforeach
    </table>
    {{ $productos->links() }}
@endsection
