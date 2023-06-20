@extends('layouts.plantilla')
@section('title', 'Categoria edit')
@section('content')
    <h1>En esta pagina editar Categorias</h1>

    <form action="{{ route('productos.update', $producto) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="">Descripcion: <br> <input type="text" name="descripcion" value="{{ $producto->descripcion }}"
                required></label>
        <br>
        <label for="">Codigo: <br> <input type="text" name="codigo" value="{{ $producto->codigo }}"
                required></label>
        <br>
        <label for="">Caja: <br> <input type="number" name="caja" value="{{ $producto->caja }}"></label>
        <br>
        <label for="">Costo: <br> <input type="number" name="costo" step="0.01" value="{{ $producto->costo }}"
                required></label>
        <br>
        <label for="">Menor: <br> <input type="number" name="menor" step="0.01"
                value="{{ $producto->precioMenor }}"></label>
        <br>
        <label for="">Mayor: <br> <input type="number" name="mayor" step="0.01"
                value="{{ $producto->precioMayor }}"></label>
        <br>
        <label for="">Origen: <br> <input type="text" name="origen" value="{{ $producto->origen }}"></label>
        <br>

        <label for="">Imagen: <br>
            <input type="file" name="imagen">
            <img src="{{ asset($producto->imagen) }}">

        </label>
        <br>
        <label for="">Categoria: <br>
            <select name="categoria" id="categoria">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </label>
        <br>

        <button type="submit">Actualizar formulario</button>
    </form>
@endsection
