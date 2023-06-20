@extends('layouts.plantilla')
@section('title', 'Producto create')
@section('content')
    <h1>En esta pagina creas Productos</h1>
    <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Descripcion: <br> <input type="text" name="descripcion" required></label>
        <br>
        @error('descripcion')
            <small>*{{$message}}</small>
        @enderror
        <br>
        <label for="">Codigo: <br> <input type="text" name="codigo" required></label>
        <br>
        @error('codigo')
            <small>*{{$message}}</small>
        @enderror
        <br>
        <label for="">Caja: <br> <input type="number" name="caja"></label>
        <br>
        <label for="">Costo: <br> <input type="number" name="costo" step="0.01" required></label>
        <br>
        @error('costo')
            <small>*{{$message}}</small>
        @enderror
        <br>
        <label for="">Menor: <br> <input type="number" name="menor" step="0.01"></label>
        <br>
        <label for="">Mayor: <br> <input type="number" name="mayor" step="0.01"></label>
        <br>
        <label for="">Origen: <br> <input type="text" name="origen"></label>
        <br>
        <label for="">Imagen: <br> <input type="file" name="imagen"></label>
        <br>
        <label for="">Categoria: <br>
            <select name="categoria" id="categoria">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </label>
        <br>

        <button type="submit">Enviar formulario</button>
    </form>
@endsection
