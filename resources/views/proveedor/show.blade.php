@extends('layouts.plantilla')

@section('title', 'Proveedor' . $proveedor->nombre)

@section('content')
    <h1>BIENVENIDO AL CURSO {{ $proveedor->nombre }}</h1>
    <a href="{{ route('proveedores.index') }}">Volver a proveedores</a>
    <a href="{{ route('proveedores.edit', $proveedor) }}">Editar</a>
    <p><strong>Cliente:</strong>{{ $proveedor->descripcion }}</p>

    <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
