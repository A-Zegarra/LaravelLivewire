<h1>Crear Categoría</h1>

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <button type="submit">Guardar</button>
</form>
