@extends('layouts.plantilla')
@section('title', 'Cliente edit')
@section('content')
    <h1>En esta pagina editar Clientes</h1>
    <form action="{{ route('clientes.update', $cliente) }}" method="post">
        @csrf
        @method('put')
        <label for="">Nombre:<br><input type="text" name="nombre" value="{{ $cliente->nombre }}"></label>
        <br>
        <br>
        <label for="">Apellido:<br><input name="apellido" value="{{ $cliente->apellido }}"></label>
        <br>
        <br>
        <label for="">Razon Social:<br><input name="razonsocial" value="{{ $cliente->razonsocial }}"></label>
        <br>
        <br>
        <label for="">Documento:<br><input name="documento" value="{{ $cliente->documento }}"></label>
        <br>
        <br>
        <label for="">Telefono:<br><input name="telefono" value="{{ $cliente->telefono }}"></label>
        <br>
        <br>
        <label for="">Correo:<br><input name="correo" value="{{ $cliente->correo }}"></label>
        <br>
        <br>
        <label for="">Pais:<br><input name="pais" value="{{ $cliente->pais }}"></label>
        <br>
        <br>
        <label for="">Ciudad:<br><input name="ciudad" value="{{ $cliente->ciudad }}"></label>
        <br>
        <br>
        <button type="submit">Actualizar formulario</button>
    </form>
@endsection
