@extends('layouts.plantilla')
@section('title', 'Proveedores')
@section('content')
    <h1>Pagina principal de Proveedores</h1>
    <a href="{{ route('proveedores.create') }}">Crear Proveedor</a>
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
        @foreach ($proveedores as $proveedor)
            <tr>

                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->razon_social }}</td>
                <td>{{ $proveedor->tipo_documento }}</td>
                <td>{{ $proveedor->nro_documento }}</td>
                <td>{{ $proveedor->correo }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->pais }}</td>
                <td>{{ $proveedor->ciudad }}</td>
                <td>{{ $proveedor->nacimiento }}</td>
                <td> <img src="{{ $proveedor->foto }}" alt="Foto" width="70px"> </td>
                <td><a href="{{ route('proveedores.show', $proveedor) }}">ver</a></td>
                <td><a href="{{ route('proveedores.edit', $proveedor) }}">editar</a></td>

            </tr>
        @endforeach
    </table>
    {{ $proveedores->links() }}
@endsection
