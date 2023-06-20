@extends('layouts.plantilla')
@section('title', 'Categorias')
@section('content')
    <h1>Pagina principal de categorias</h1>
    <a href="{{ route('categorias.create') }}">Crear Categoria</a>
    <ul>
        @foreach ($categorias as $categoria)
            <p>{{ $categoria->nombre }}, {{ $categoria->descripcion }}
                <a href="{{ route('categorias.show', $categoria) }}">ver</a>
                <a href="{{ route('categorias.edit', $categoria) }}">editar</a>
            </p>
        @endforeach
    </ul>
    {{ $categorias->links() }}
@endsection
