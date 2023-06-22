<header>
    <h1>Coders Free</h1>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
            </li>

            <li><a href="{{ route('categorias.index') }}"
                    class="{{ request()->routeIs('categorias.*') ? 'active' : '' }}">Categorias</a>
            </li>

            <li><a href="{{ route('clientes.index') }}"
                    class="{{ request()->routeIs('clientes.*') ? 'active' : '' }}">Clientes</a>
            </li>

            <li><a href="{{ route('contenedores.index') }}"
                    class="{{ request()->routeIs('contenedores.*') ? 'active' : '' }}">Contenedores</a>
            </li>

            <li><a href="{{ route('ingresos.index') }}"
                    class="{{ request()->routeIs('ingresos.*') ? 'active' : '' }}">Ingresos</a>
            </li>

            <li><a href="{{ route('productos.index') }}"
                    class="{{ request()->routeIs('productos.*') ? 'active' : '' }}">Productos</a>
            </li>

            <li><a href="{{ route('proveedores.index') }}"
                    class="{{ request()->routeIs('proveedores.*') ? 'active' : '' }}">Proveedores</a>
            </li>

            <li><a href="{{ route('roles.index') }}"
                    class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">Roles</a>
            </li>

        </ul>
    </nav>
</header>
