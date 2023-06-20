<h1>Editar Categoría</h1>

<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ $categoria->nombre }}" required>

    <button type="submit">Guardar</button>
</form>
