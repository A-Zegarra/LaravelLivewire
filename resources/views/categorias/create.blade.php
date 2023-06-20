@extends('layouts.plantilla')
@section('title', 'Categoria create')
@section('content')
    <h1>En esta pagina creas Categorias</h1>
    <form action="{{ route('categorias.store') }}" method="post">
        @csrf
        <label for="">
            Nombre:
            <br>
            <input type="text" name="nombre">
        </label>
        <br>
        @error('nombre')
            <small>*{{ $message }}</small>
        @enderror

        <br>
        <label for="">
            Descripcion:
            <br>
            <textarea name="descripcion" rows="3"></textarea>
        </label>
        <br>
        @error('descripcion')
            <small>*{{ $message }}</small>
        @enderror
        <br>
        <button type="submit">Enviar formulario</button>
    </form>
@endsection
