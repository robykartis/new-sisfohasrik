<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;





// =======================HALAMAN ADMIN========================//
// Dashboard Admin
Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin'));
});

// =======================HALAMAN ADMIN USERS========================//
// User
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Pengguna', route('users.index'));
});
// User > create
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Tambah', route('users.create'));
});
// User > edit
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user): void {
    $trail->parent('users.index');
    $trail->push('Edit', route('users.edit', $user));
});
// User > show
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user): void {
    $trail->parent('users.index');
    $trail->push('Show', route('users.show', $user));
});
// =======================END HALAMAN ADMIN USERS========================//


// Bidang Temuan
Breadcrumbs::for('bidangtemuan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Data', route('bidangtemuan.index'));
});
// Kode Temuan
Breadcrumbs::for('kodetemuan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Data', route('kodetemuan.index'));
});
// Kode Rekomendasi
Breadcrumbs::for('koderekomendasi.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Data', route('koderekomendasi.index'));
});
// Kode Penyebab
Breadcrumbs::for('kodepenyebab.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Data', route('kodepenyebab.index'));
});
// Kode Tlhp
Breadcrumbs::for('kodetlhp.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Data', route('kodetlhp.index'));
});
// Klarifikasi Obrik
Breadcrumbs::for('klarifikasiobrik.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Data', route('klarifikasiobrik.index'));
});
// Pendaftran Obrik
Breadcrumbs::for('pendaftaranobrik.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Data', route('pendaftaranobrik.index'));
});
// Tambah Pendaftran Obrik
Breadcrumbs::for('pendaftaranobrik.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Tambah Data', route('pendaftaranobrik.create'));
});
// Edit Pendaftran Obrik
Breadcrumbs::for('pendaftaranobrik.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin');
    $trail->push('Edit Data', route('pendaftaranobrik.edit', $id));
});
// Jenis Pemeriksaan
Breadcrumbs::for('jenispemeriksaan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Data', route('jenispemeriksaan.index'));
});
// LHP
Breadcrumbs::for('lhp.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('LHP', route('lhp.index'));
});
// LHP Create
Breadcrumbs::for('lhp.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Tambah Data', route('lhp.create'));
});
// LHP Edit
Breadcrumbs::for('lhp.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Edit Data', route('lhp.edit', $id));
});
// LHP Show
Breadcrumbs::for('lhp.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Detail Data', route('lhp.show', $id));
});

// Tambah Temuan
Breadcrumbs::for('temuan.create', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Tambah Data', route('temuan.create', $id));
});
// Edit Temuan
Breadcrumbs::for('temuan.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Edit Data', route('temuan.edit', $id));
});
// Temuan Show
Breadcrumbs::for('temuan.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Detail Data', route('temuan.show', $id));
});
// Penyebab 
Breadcrumbs::for('penyebab.index', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Data', route('penyebab.index', $id));
});
// Tambah Penyebab
Breadcrumbs::for('penyebab.create', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Tambah Data', route('penyebab.index', $id));
});
// Penyebab Show
Breadcrumbs::for('penyebab.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Detail Data', route('penyebab.show', $id));
});
// Penyebab Edit
Breadcrumbs::for('penyebab.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Edit Data', route('penyebab.edit', $id));
});
// Rekomendasi Index
Breadcrumbs::for('rekomendasi.index', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Data', route('rekomendasi.index', $id));
});
// Rekomendasi Create
Breadcrumbs::for('rekomendasi.create', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Tambah Data', route('rekomendasi.create', $id));
});
// Rekomendasi Create
Breadcrumbs::for('rekomendasi.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Detail Data', route('rekomendasi.show', $id));
});
// Rekomendasi Edit
Breadcrumbs::for('rekomendasi.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Edit Data', route('rekomendasi.edit', $id));
});
// Tindak Lanjut Index
Breadcrumbs::for('tindaklanjut.index', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Data', route('tindaklanjut.index', $id));
});
// Tindak Lanjut Show
Breadcrumbs::for('tindaklanjut.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Detail Data', route('tindaklanjut.show', $id));
});
// Tindak Lanjut Edit
Breadcrumbs::for('tindaklanjut.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Edit Data', route('tindaklanjut.edit', $id));
});
// Penarikan RND Index
Breadcrumbs::for('penarikanrnd.index', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Data', route('penarikanrnd.index', $id));
});
// Penarikan RND Create
Breadcrumbs::for('penarikanrnd.create', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Tambah Data', route('penarikanrnd.create', $id));
});
// Penarikan RND Edit
Breadcrumbs::for('penarikanrnd.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Edit Data', route('penarikanrnd.edit', $id));
});

// =======================END HALAMAN ADMIN========================//



// Dashboard  Operator
Breadcrumbs::for('operator', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('operator'));
});
// Dashboard  Read Only
Breadcrumbs::for('readonly', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('readonly'));
});
