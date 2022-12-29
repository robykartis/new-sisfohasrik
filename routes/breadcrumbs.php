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


// Kode Temuan
Breadcrumbs::for('temuan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Kode Temuan', route('temuan.index'));
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
