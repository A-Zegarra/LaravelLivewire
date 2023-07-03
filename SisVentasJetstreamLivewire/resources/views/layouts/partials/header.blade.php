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

            <li><a href="{{ route('comprobante_electronico.index') }}"
                    class="{{ request()->routeIs('comprobante_electronico.*') ? 'active' : '' }}">Comprobantes
                    Electronicos</a>
            </li>

            <li><a href="{{ route('detalle_importacion.index') }}"
                    class="{{ request()->routeIs('detalle_importacion.*') ? 'active' : '' }}">Detalle Importacion</a>
            </li>

            <li><a href="{{ route('detalle_venta.index') }}"
                    class="{{ request()->routeIs('detalle_venta.*') ? 'active' : '' }}">Detalle Venta</a>
            </li>

            <li><a href="{{ route('importacion.index') }}"
                    class="{{ request()->routeIs('importacion.*') ? 'active' : '' }}">Importacion</a>
            </li>

            <li><a href="{{ route('movimiento.index') }}"
                    class="{{ request()->routeIs('movimiento.*') ? 'active' : '' }}">Movimientos</a>
            </li>

            <li><a href="{{ route('productos.index') }}"
                    class="{{ request()->routeIs('productos.*') ? 'active' : '' }}">Productos</a>
            </li>

            <li><a href="{{ route('proveedores.index') }}"
                    class="{{ request()->routeIs('proveedores.*') ? 'active' : '' }}">Proveedores</a>
            </li>

            <li><a href="{{ route('ventas.index') }}"
                    class="{{ request()->routeIs('ventas.*') ? 'active' : '' }}">Ventas</a>
            </li>
        </ul>
    </nav>
</header>
