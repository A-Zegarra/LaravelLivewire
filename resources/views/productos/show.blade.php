@extends('layouts.plantilla')

@section('title', 'Producto' . $producto->nombre)

@section('content')
    <h1>BIENVENIDO AL CURSO {{ $producto->nombre }}</h1>
    <a href="{{ route('productos.index') }}">Volver a Productos</a>
    <a href="{{ route('productos.edit', $producto) }}">Editar</a>
    <p><strong>Producto:</strong>{{ $producto->descripcion }}</p>
@endsection
