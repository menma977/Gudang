<li class="nav-item has-treeview {{ request()->is(['user','user/create','user/edit/*',]) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->is(['user','user/create','user/edit/*',]) ? 'active' : '' }}">
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
        <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('user/edit/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('user/destroy/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Hapus</p>
            </a>
        </li>
    </ul>
</li>
