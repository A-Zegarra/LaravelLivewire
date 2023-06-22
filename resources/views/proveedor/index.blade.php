@extends('layouts.plantilla')
@section('title', 'Proveedores')
@section('content')
    <h1>Pagina principal de proveedores</h1>
    <a href="{{ route('proveedores.create') }}">Crear Proveedor</a>
    <ul>
        @foreach ($proveedores as $proveedor)
            <p>{{ $proveedor->nombre }}, {{ $proveedor->apellido }}
                <a href="{{ route('proveedores.show', $proveedor) }}">ver</a>
                <a href="{{ route('proveedores.edit', $proveedor) }}">editar</a>
            </p>
        @endforeach
    </ul>
    {{ $proveedores->links() }}
@endsection
