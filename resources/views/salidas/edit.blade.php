@extends('layouts.plantilla')
@section('title', 'Categoria edit')
@section('content')
    <h1>En esta pagina editar Categorias</h1>
    <form action="{{ route('categorias.update', $categoria) }}" method="post">
        @csrf
        @method('put')
        <label for="">
            Nombre:
            <br>
            <input type="text" name="nombre" value="{{ $categoria->nombre }}">
        </label>
        <br><br>
        <label for="">
            Descripcion:
            <br>
            <textarea name="descripcion" rows="3">{{ $categoria->descripcion }}</textarea>
        </label>
        <br>
        <button type="submit">Actualizar formulario</button>
    </form>
@endsection
