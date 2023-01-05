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
    $trail->push('Users', route('users.index'));
});
// User > create
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Create', route('users.create'));
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
    $trail->push('Bidang Temuan', route('bidangtemuan.index'));
});
// Kode Temuan
Breadcrumbs::for('temuan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Kode Temuan', route('temuan.index'));
});
// Kode Rekomendasi
Breadcrumbs::for('koderekomendasi.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Kode Rekomendasi', route('koderekomendasi.index'));
});
// Kode Penyebab
Breadcrumbs::for('kodepenyebab.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Kode Penyebab', route('kodepenyebab.index'));
});
// Kode Tlhp
Breadcrumbs::for('kodetlhp.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Kode TLHP', route('kodetlhp.index'));
});
// Klarifikasi Obrik
Breadcrumbs::for('klarifikasiobrik.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Klarifikasi Obrik', route('klarifikasiobrik.index'));
});
// Pendaftran Obrik
Breadcrumbs::for('pendaftaranobrik.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Pendaftaran Obrik', route('pendaftaranobrik.index'));
});
// Tambah Pendaftran Obrik
Breadcrumbs::for('pendaftaranobrik.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Tambah Pendaftaran Obrik', route('pendaftaranobrik.create'));
});
// Edit Pendaftran Obrik
Breadcrumbs::for('pendaftaranobrik.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin');
    $trail->push('Edit Pendaftaran Obrik', route('pendaftaranobrik.edit', $id));
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
