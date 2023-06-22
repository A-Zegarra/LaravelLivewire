@extends('layouts.plantilla')
@section('title', 'Clientes')
@section('content')
    <h1>Pagina principal de clientes</h1>
    <a href="{{ route('clientes.create') }}">Crear Categoria</a>
    <ul>
        @foreach ($clientes as $cliente)
            <p>{{ $cliente->nombre }}, {{ $cliente->apellido }}
                <a href="{{ route('clientes.show', $cliente) }}">ver</a>
                <a href="{{ route('clientes.edit', $cliente) }}">editar</a>
            </p>
        @endforeach
    </ul>
    {{ $clientes->links() }}
@endsection
