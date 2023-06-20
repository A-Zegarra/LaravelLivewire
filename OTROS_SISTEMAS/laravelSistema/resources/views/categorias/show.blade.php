<h1>Detalles de la Categoría</h1>

<p><strong>ID:</strong> {{ $categoria->id }}</p>
<p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>

<a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
<form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
</form>
