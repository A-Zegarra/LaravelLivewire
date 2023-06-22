@extends('layouts.plantilla')

@section('title', 'Cliente' . $cliente->nombre)

@section('content')
    <h1>BIENVENIDO AL CURSO {{ $cliente->nombre }}</h1>
    <a href="{{ route('clientes.index') }}">Volver a clientes</a>
    <a href="{{ route('clientes.edit', $cliente) }}">Editar</a>
    <p><strong>Cliente:</strong>{{ $cliente->descripcion }}</p>

    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
