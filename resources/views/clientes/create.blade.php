@extends('layouts.plantilla')
@section('title', 'Cliente create')
@section('content')
    <h1>En esta pagina creas Categorias</h1>
    <form action="{{ route('clientes.store') }}" method="post">
        @csrf

        <label for="">Nombre:<br><input type="text" name="nombre"></label>
        <br>
        @error('nombre')
            <small>*{{ $message }}</small>
        @enderror

        <br>
        <label for="">Apellido:<br><input type="text" name="apellido" ></label>
        <br>
        @error('apellido')
            <small>*{{ $message }}</small>
        @enderror
        
        <br>
        <label for="">Razon Social:<br><input type="text" name="razonsocial" ></label>
        <br>
        <br>
        <label for="">Documento:<br><input type="number" name="documento" ></label>
        <br>
        <br>
        <label for="">Telefono:<br><input type="number" name="telefono" ></label>
        <br>
        <br>
        <label for="">Correo:<br><input type="mail" name="correo" ></label>
        <br>
        <br>
        <label for="">Pais:<br><input type="text" name="pais" ></label>
        <br>
        <br>
        <label for="">Ciudad:<br><input type="text" name="ciudad" ></label>
        <br>
<br>
        <button type="submit">Enviar formulario</button>

    </form>
@endsection
