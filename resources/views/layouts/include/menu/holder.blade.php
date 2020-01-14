<li
    class="nav-item has-treeview {{ request()->is(['user','user/create','user/edit/*','user/delete']) ? 'menu-open' : '' }}">
    <a href="#"
       class="nav-link {{ request()->is(['user','user/create','user/edit/*','user/delete']) ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            User
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.create') }}" class="nav-link {{ request()->is('user/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buat</p>
            </a>
        </li>
        <li class="nav-item has-treeview {{ request()->is('user/edit/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('user/edit/*') ? 'active' : '' }}" data-toggle="modal"
               data-target="#userListModal">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.delete') }}" class="nav-link {{ request()->is('user/delete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Hapus</p>
            </a>
        </li>
    </ul>
</li>
<li
    class="nav-item has-treeview {{ request()->is(['route','route/create','route/edit/*','route/delete']) ? 'menu-open' : '' }}">
    <a href="#"
       class="nav-link {{ request()->is(['route','route/create','route/edit/*','route/delete']) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map"></i>
        <p>
            Rute
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('route.index') }}" class="nav-link {{ request()->is('route') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('route.create') }}" class="nav-link {{ request()->is('route/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buat</p>
            </a>
        </li>
    </ul>
</li>
<li
    class="nav-item has-treeview {{ request()->is(['store','store/create','store/edit/*','store/delete']) ? 'menu-open' : '' }}">
    <a href="#"
       class="nav-link {{ request()->is(['store','store/create','store/edit/*','store/delete']) ? 'active' : '' }}">
        <i class="nav-icon fas fa-store"></i>
        <p>
            Toko
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('store.index') }}" class="nav-link {{ request()->is('store') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('store.create') }}" class="nav-link {{ request()->is('store/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buat</p>
            </a>
        </li>
    </ul>
</li>
