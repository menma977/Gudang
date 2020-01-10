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
            <a href="#" class="nav-link {{ request()->is('user/edit/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit</p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($users as $item)
                <li class="nav-item">
                    <a href="{{ route('user.edit', base64_encode($item->id)) }}"
                        class="nav-link {{ request()->is('user/edit/'.base64_encode($item->id)) ? 'active' : '' }}">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>{{ $item->name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.delete') }}" class="nav-link {{ request()->is('user/delete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Hapus</p>
            </a>
        </li>
    </ul>
</li>