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
    $trail->push('Tambah Temuan', route('temuan.create', $id));
});
// Edit Temuan
Breadcrumbs::for('temuan.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Edit Temuan', route('temuan.edit', $id));
});
// Temuan Show
Breadcrumbs::for('temuan.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('lhp.index');
    $trail->push('Detail Temuan', route('temuan.show', $id));
});
//Penyebab
Breadcrumbs::for('penyebab.index', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Penyebab', route('penyebab.index', $id));
});
// Tambah Penyebab
Breadcrumbs::for('penyebab.create', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Tambah Penyebab', route('penyebab.create', $id));
});
// Penyebab Show
Breadcrumbs::for('penyebab.show', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Detail Penyebab', route('penyebab.show', $id));
});
// Penyebab Edit
Breadcrumbs::for('penyebab.edit', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Edit Penyebab', route('penyebab.edit', $id));
});
// Rekomendasi Index
Breadcrumbs::for('rekomendasi.index', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Data Rekomendasi', route('rekomendasi.index', $id));
});
// Rekomendasi Create
Breadcrumbs::for('rekomendasi.create', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Tambah Rekomendasi', route('rekomendasi.create', $id));
});
// Rekomendasi Show
Breadcrumbs::for('rekomendasi.show', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Detail Rekomendasi', route('rekomendasi.show', $id));
});
// Rekomendasi Edit
Breadcrumbs::for('rekomendasi.edit', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Edit Rekomendasi', route('rekomendasi.edit', $id));
});
// Tindak Lanjut Index
Breadcrumbs::for('tindaklanjut.index', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Data Tindak Lanjut', route('tindaklanjut.index', $id));
});
// Tindak Lanjut Show
Breadcrumbs::for('tindaklanjut.show', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Detail Tindak Lanjut', route('tindaklanjut.show', $id));
});
// Tindak Lanjut Edit
Breadcrumbs::for('tindaklanjut.edit', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Edit Tindak Lanjut', route('tindaklanjut.edit', $id));
});
// Penarikan RND Index
Breadcrumbs::for('penarikanrnd.index', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Data Penarikan RND', route('penarikanrnd.index', $id));
});
// Penarikan RND Create
Breadcrumbs::for('penarikanrnd.create', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Tambah Penarikan RND', route('penarikanrnd.create', $id));
});
// Penarikan RND Edit
Breadcrumbs::for('penarikanrnd.edit', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Edit Penarikan RND', route('penarikanrnd.edit', $id));
});
// Penarikan RND Edit
Breadcrumbs::for('penarikanrnd.show', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Edit Penarikan RND', route('penarikanrnd.show', $id));
});
// Penarikan SND Index
Breadcrumbs::for('penarikansnd.index', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Data Penarikan SND', route('penarikansnd.index', $id));
});
// Penarikan SND Create
Breadcrumbs::for('penarikansnd.create', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Lhp', route('lhp.index'));
    $trail->push('Temuan', route('temuan.show', $id));
    $trail->push('Tambah Penarikan SND', route('penarikansnd.create', $id));
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
