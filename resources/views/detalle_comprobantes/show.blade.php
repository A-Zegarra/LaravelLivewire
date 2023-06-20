@extends('layouts.plantilla')

@section('title', 'Categoria' . $categoria->nombre)

@section('content')
    <h1>BIENVENIDO AL CURSO {{ $categoria->nombre }}</h1>
    <a href="{{ route('categorias.index') }}">Volver a categorias</a>
    <a href="{{ route('categorias.edit', $categoria) }}">Editar</a>
    <p><strong>Categoria:</strong>{{ $categoria->descripcion }}</p>

    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
