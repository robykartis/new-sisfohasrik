<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item ">
        <a href="{{ route('admin') }}" class="nav-link {{ set_active(['admin']) }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-header">Admin</li>
    <li class="nav-item ">
        <a href="{{ route('users.index') }}"
            class="nav-link  {{ set_active(['users.index', 'users.create', 'users.show', 'users.edit']) }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                User Management
            </p>
        </a>
    </li>
    <li class="nav-item ">
        <a href="{{ route('bidangtemuan.index') }}" class="nav-link {{ set_active(['bidangtemuan.index', '']) }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Bidang Temuan
            </p>
        </a>
    </li>

    <li
        class="nav-item {{ set_expand(['kodetemuan.index', 'koderekomendasi.index', 'kodepenyebab.index', 'kodetlhp.index']) }}">
        <a href="#"
            class="nav-link {{ set_active(['kodetemuan.index', 'koderekomendasi.index', 'kodepenyebab.index', 'kodetlhp.index']) }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Kode
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('kodetemuan.index') }}" class="nav-link {{ set_active(['kodetemuan.index']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kode Temuan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('koderekomendasi.index') }}"
                    class="nav-link {{ set_active(['koderekomendasi.index']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kode Rekomendasi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kodepenyebab.index') }}" class="nav-link {{ set_active(['kodepenyebab.index']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kode Penyebab</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kodetlhp.index') }}" class="nav-link {{ set_active(['kodetlhp.index']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kode TLHP</p>
                </a>
            </li>
        </ul>
    </li>
    <li
        class="nav-item {{ set_expand(['klarifikasiobrik.index', 'pendaftaranobrik.index', 'pendaftaranobrik.create', 'pendaftaranobrik.edit']) }}">
        <a href="#"
            class="nav-link {{ set_active(['klarifikasiobrik.index', 'pendaftaranobrik.index', 'pendaftaranobrik.create', 'pendaftaranobrik.edit']) }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Obrik
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{ route('klarifikasiobrik.index') }}"
                    class="nav-link {{ set_active(['klarifikasiobrik.index']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Klarifikasi Obrik</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pendaftaranobrik.index') }}"
                    class="nav-link {{ set_active(['pendaftaranobrik.index', 'pendaftaranobrik.create', 'pendaftaranobrik.edit']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pendaftaran Obrik</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-header">Form Isian</li>
    <li
        class="nav-item {{ set_expand(['lhp.index', 'lhp.create', 'lhp.edit', 'temuan.index', 'temuan.create', 'temuan.edit']) }}">
        <a href="#"
            class="nav-link {{ set_active(['lhp.index', 'lhp.create', 'lhp.edit', 'temuan.index', 'temuan.create', 'temuan.edit']) }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Pemeriksaan
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{ route('lhp.index') }}"
                    class="nav-link {{ set_active(['lhp.index', 'lhp.create', 'lhp.edit']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Pemeriksaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('temuan.index') }}"
                    class="nav-link {{ set_active(['temuan.index', 'temuan.create', 'temuan.edit']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Temuan</p>
                </a>
            </li>
        </ul>
    </li>

</ul>
