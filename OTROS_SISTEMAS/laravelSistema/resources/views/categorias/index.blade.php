<h1>Lista de Categorías</h1>

<a href="{{ route('categorias.create') }}">Crear nueva categoría</a>
<style>
    .pagination .page-link {
        font-size: 14px;
        /* Ajusta el tamaño de fuente según tus preferencias */
    }
</style>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>
                    <a href="{{ route('categorias.show', $categoria->id) }}">Ver</a>
                    <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <div class="container">
            {{ $categorias->links() }}
        </div>
    </tbody>
</table>
