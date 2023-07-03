@extends('layouts.plantilla')
@section('title', 'Categorias')
@section('content')
    <h1>Pagina principal de categorias</h1>
    <a href="{{ route('categorias.create') }}">Crear Categoria</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td><a href="{{ route('categorias.show', $categoria) }}">ver</a></td>
                <td><a href="{{ route('categorias.edit', $categoria) }}">editar</a></td>
            </tr>
        @endforeach
    </table>
    {{ $categorias->links() }}
@endsection
