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
// =======================END HALAMAN ADMIN USERS========================//

// =======================END HALAMAN ADMIN========================//



// Dashboard  Operator
Breadcrumbs::for('dashboard_op', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('operator'));
});
// Dashboard  Read Only
Breadcrumbs::for('dashboard_re', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('readonly'));
});
