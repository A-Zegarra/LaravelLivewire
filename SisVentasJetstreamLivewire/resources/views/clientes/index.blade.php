@extends('layouts.plantilla')
@section('title', 'Clientes')
@section('content')
    <h1>Pagina principal de Clientes</h1>
    <a href="{{ route('clientes.create') }}">Crear Categoria</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Razon Social</th>
            <th>Tipo </th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Pais</th>
            <th>Ciudad</th>
            <th>Nacimiento</th>
            <th>Foto</th>
            <th colspan="2">Opciones</th>
        </tr>
        @foreach ($clientes as $cliente)
            <tr>

                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->razon_social }}</td>
                <td>{{ $cliente->tipo_documento }}</td>
                <td>{{ $cliente->nro_documento }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->pais }}</td>
                <td>{{ $cliente->ciudad }}</td>
                <td>{{ $cliente->nacimiento }}</td>
                <td> <img src="{{ $cliente->foto }}" alt="Foto" width="70px"> </td>
                <td><a href="{{ route('clientes.show', $cliente) }}">ver</a></td>
                <td><a href="{{ route('clientes.edit', $cliente) }}">editar</a></td>

            </tr>
        @endforeach
    </table>
    {{ $clientes->links() }}
@endsection
