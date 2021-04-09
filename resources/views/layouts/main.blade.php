
<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview {{ (request()->is('home')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item ">
                <a href="{{url('home')}} " class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Home</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{url('pedidos')}}" class="nav-link {{ (request()->is('pedidos')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pedidos</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{url('dashboard')}} " class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
                </a>
            </li> --}}
        </ul>
    </li>
    @hasanyrole('Admin|Tienda')
    <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog"></i>
        <p>
            Mantenimientos
            <i class="fas fa-angle-left right"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
            {{-- <li class="nav-item">
                <a href="{{url('admin/form')}} " class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Usuarios</p>
                </a>
            </li> --}}

            @hasanyrole('Admin') {{-- CONVENIO --}}
            <li class="nav-item">
                <a href="{{url('galerias')}} " class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Galerías</p>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('Admin') {{-- CONVENIO --}}
            <li class="nav-item">
                <a href="{{url('tiendas')}} " class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Restaurantes</p>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('Admin|Tienda') {{-- CONVENIO --}}
            <li class="nav-item">
                <a href="{{url('mitienda')}} " class="nav-link">
                <i class="fas fa-hotel"></i>
                <p>Mi Restaurante</p>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('Admin|Tienda') {{-- CONVENIO --}}
            <li class="nav-item">
                <a href="{{route('categorias.index')}} " class="nav-link">
                <i class="fas fa-cubes"></i>
                <p>Categorías</p>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('Admin|Tienda') {{-- CONVENIO --}}
            <li class="nav-item">
                <a href="{{url('products')}} " class="nav-link">
                <i class="fas fa-concierge-bell"></i>
                <p>Menu/Carta</p>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('Admin') {{-- CONVENIO --}}
            <li class="nav-item">
                <a href="{{route('personal.index')}} " class="nav-link">

                <i class="far fa-circle nav-icon"></i>
                <p>Usuarios</p>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('Admin') {{-- CONVENIO --}}
            <li class="nav-item">
                <a href="{{route('delivery.index')}} " class="nav-link">

                <i class="far fa-circle nav-icon"></i>
                <p>Delivery</p>
                </a>
            </li>
            @endhasanyrole
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                  Salir
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </li>
    @endhasanyrole
    @hasanyrole('Admin')
    <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog"></i>
        <p>
            MultiUsuarios
            <i class="fas fa-angle-left right"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <select name="users" id="userid" class="form-control select2">
                </select>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-success btn-sm" onclick="impersonate()">Ir a restaurante</button>
            </li>
        </ul>
    </li>
    @endhasanyrole
    <li class="nav-item">
        @if(session('impersonated_by'))
            <a href="{{route('users.impersonate_leave')}}" class="btn btn-danger btn-sm"> <i class="fa fa-reply"></i> Volver</a>
        @endif
    </li>
    </ul>
