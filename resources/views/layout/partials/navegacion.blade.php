<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('categoria.index')}}" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
    <!-- Right navbar links -->
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('img/LogoSample_ByTailorBrands.jpg')}}" alt="Dj-Andres"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Punto de Venta</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img id="avatar4" src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Diego Jimenez</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">Usuarios</li>
                <li class="nav-item">
                    <a href="{{route('usuario.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Gestión de Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-header">CATEGORIAS</li>
                <li class="nav-item">
                    <a href="{{route('categoria.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>
                            Gestión de Categorias
                        </p>
                    </a>
                </li>
                <li class="nav-header">ARTICULOS</li>
                <li class="nav-item">
                    <a href="{{route('articulo.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-vials"></i>
                        <p>
                            Gestión de Articulos
                        </p>
                    </a>
                </li>
                <li class="nav-header">COMPRAS</li>
                <li id="gestion_proveedor" class="nav-item">
                    <a href="{{route('proveedor.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Gestión de Proveedores
                        </p>
                    </a>
                </li>
                <li id="gestion_ingresos" class="nav-item">
                    <a href="{{route('ingreso.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Gestión de Ingresos
                        </p>
                    </a>
                </li>
                <li class="nav-header">VENTAS</li>
                <li id="gestion_proveedor" class="nav-item">
                    <a href="{{route('cliente.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Gestión de Clientes
                        </p>
                    </a>
                </li>
                <li id="gestion_proveedor" class="nav-item">
                    <a href="{{route('venta.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Gestión de Ventas
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
</aside>