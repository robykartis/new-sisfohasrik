<ul id="menu" class="metismenu">
    <li>
        <a href="{{ route('admin') }}">
            <div class="parent-icon"><i class="bi bi-speedometer"></i></div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>


    <li class="menu-label ">Admin</li>
    <li class="{{ set_active(['users.index', 'users.create', 'users.show', 'users.edit']) }}">
        <a href="{{ route('users.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Usermanagement</div>
        </a>
    </li>
    <li class="{{ set_active(['bidangtemuan.index']) }}">
        <a href="{{ route('bidangtemuan.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Bidang Temuan</div>
        </a>
    </li>
    <li class="{{ set_active(['temuan.index']) }}">
        <a href="{{ route('temuan.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Kode Temuan</div>
        </a>
    </li>
    <li class="{{ set_active(['koderekomendasi.index']) }}">
        <a href="{{ route('koderekomendasi.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Kode Rekomendasi</div>
        </a>
    </li>
    <li class="{{ set_active(['kodepenyebab.index']) }}">
        <a href="{{ route('kodepenyebab.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Kode Penyebab</div>
        </a>
    </li>
    <li class="{{ set_active(['kodetlhp.index']) }}">
        <a href="{{ route('kodetlhp.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Kode TLHP</div>
        </a>
    </li>
    <li class="{{ set_active(['klarifikasiobrik.index']) }}">
        <a href="{{ route('klarifikasiobrik.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Klarifikasi Obrik</div>
        </a>
    </li>
    <li class="{{ set_active(['pendaftaranobrik.index', 'pendaftaranobrik.create', 'pendaftaranobrik.edit']) }}">
        <a href="{{ route('pendaftaranobrik.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Pendaftaran Obrik</div>
        </a>
    </li>
    <li class="{{ set_active(['jenispemeriksaan.index']) }}">
        <a href="{{ route('jenispemeriksaan.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Jenis Pemeriksaan</div>
        </a>
    </li>

    <li class="menu-label ">ISIAN</li>
    <li class="{{ set_active(['lhp.index', 'lhp.create', 'lhp.edit']) }}">
        <a href="{{ route('lhp.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Hasil Pemeriksaan</div>
        </a>
    </li>
    <li class="{{ set_active(['jenispemeriksaan.index']) }}">
        <a href="{{ route('jenispemeriksaan.index') }}">
            <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
            <div class="menu-title">Jenis Pemeriksaan</div>
        </a>
    </li>
</ul>
