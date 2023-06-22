@extends('layouts.plantilla')
@section('title', 'Proveedor edit')
@section('content')
    <h1>En esta pagina editar Proveedores</h1>
    <form action="{{ route('proveedores.update', $proveedor) }}" method="post">
        @csrf
        @method('put')
        <label for="">Nombre:<br><input type="text" name="nombre" value="{{ $proveedor->nombre }}"></label>
        <br>
        <br>
        <label for="">Apellido:<br><input name="apellido" value="{{ $proveedor->apellido }}"></label>
        <br>
        <br>
        <label for="">Razon Social:<br><input name="razonsocial" value="{{ $proveedor->razonsocial }}"></label>
        <br>
        <br>
        <label for="">Documento:<br><input name="documento" value="{{ $proveedor->documento }}"></label>
        <br>
        <br>
        <label for="">Telefono:<br><input name="telefono" value="{{ $proveedor->telefono }}"></label>
        <br>
        <br>
        <label for="">Correo:<br><input name="correo" value="{{ $proveedor->correo }}"></label>
        <br>
        <br>
        <label for="">Pais:<br><input name="pais" value="{{ $proveedor->pais }}"></label>
        <br>
        <br>
        <label for="">Ciudad:<br><input name="ciudad" value="{{ $proveedor->ciudad }}"></label>
        <br>
        <br>
        <button type="submit">Actualizar formulario</button>
    </form>
@endsection
