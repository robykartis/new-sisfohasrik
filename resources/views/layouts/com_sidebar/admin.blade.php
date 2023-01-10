<div class="content-side">
    <ul class="nav-main">
        <li class="nav-main-item">
            <a class="nav-main-link {{ set_active(['admin']) }}" href="{{ route('admin') }}">
                <i class="nav-main-link-icon si si-speedometer"></i>
                <span class="nav-main-link-name">Dashboardd</span>
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
            <a class="nav-main-link {{ set_active(['bidangtemuan.index', '']) }}"
                href="{{ route('bidangtemuan.index') }}">
                <i class="nav-main-link-icon si si-speedometer"></i>
                <span class="nav-main-link-name">Bidang Temuan</span>
            </a>
        </li>

        <li
            class="nav-main-item {{ set_expand(['temuan.index', 'koderekomendasi.index', 'kodepenyebab.index', 'kodetlhp.index']) }}">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-puzzle"></i>
                <span class="nav-main-link-name">Kode</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ set_active(['temuan.index']) }}" href="{{ route('temuan.index') }}">
                        <span class="nav-main-link-name">Kode Temuan</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ set_active(['koderekomendasi.index']) }}"
                        href="{{ route('koderekomendasi.index') }}">
                        <span class="nav-main-link-name">Kode Rekomendasi</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ set_active(['kodepenyebab.index']) }}"
                        href="{{ route('kodepenyebab.index') }}">
                        <span class="nav-main-link-name">Kode Penyebab</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ set_active(['kodetlhp.index']) }}"
                        href="{{ route('kodetlhp.index') }}">
                        <span class="nav-main-link-name">Kode TLHP</span>
                    </a>
                </li>

            </ul>
        </li>
        <li
            class="nav-main-item {{ set_expand(['klarifikasiobrik.index', 'pendaftaranobrik.index', 'pendaftaranobrik.create', 'pendaftaranobrik.edit']) }}">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-puzzle"></i>
                <span class="nav-main-link-name">Obrik</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ set_active(['klarifikasiobrik.index']) }}"
                        href="{{ route('klarifikasiobrik.index') }}">
                        <span class="nav-main-link-name">Klarifikasi Obrik</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ set_active(['pendaftaranobrik.index', 'pendaftaranobrik.create', 'pendaftaranobrik.edit']) }}"
                        href="{{ route('pendaftaranobrik.index') }}">
                        <span class="nav-main-link-name">Daftarkan Obrik</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
