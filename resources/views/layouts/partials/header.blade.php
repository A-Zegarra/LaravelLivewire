

<header>
    <h1>Coders Free</h1>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
            </li>

            <li><a href="{{ route('categorias.index') }}"
                    class="{{ request()->routeIs('categorias.*') ? 'active' : '' }}">Categorias</a>
            </li>

            <li><a href="{{ route('productos.index') }}"
                    class="{{ request()->routeIs('productos.*') ? 'active' : '' }}">Productos</a>
            </li>
        </ul>
    </nav>
</header>