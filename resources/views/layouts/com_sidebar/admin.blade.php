<div class="content-side">
    <ul class="nav-main">
        <li class="nav-main-item">
            <a class="nav-main-link {{ set_active(['admin']) }}" href="{{ route('admin') }}">
                <i class="nav-main-link-icon si si-speedometer"></i>
                <span class="nav-main-link-name">Dashboard</span>
            </a>
        </li>
        <li class="nav-main-heading">Heading</li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ set_active(['users.index', 'users.create', 'users.show', 'users.edit']) }}"
                href="{{ route('users.index') }}">
                <i class="nav-main-link-icon si si-speedometer"></i>
                <span class="nav-main-link-name">User Management</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-puzzle"></i>
                <span class="nav-main-link-name">Dropdown</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="javascript:void(0)">
                        <span class="nav-main-link-name">Link #1</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="javascript:void(0)">
                        <span class="nav-main-link-name">Link #2</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
