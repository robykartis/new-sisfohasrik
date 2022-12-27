<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;






// Dashboard Admin
Breadcrumbs::for('dashboard_ad', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin'));
});

// Dashboard  Operator
Breadcrumbs::for('dashboard_op', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('operator'));
});
// Dashboard  Read Only
Breadcrumbs::for('dashboard_re', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('readonly'));
});



// User
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard_ad');
    $trail->push('Users', route('users.index'));
});
// User > create
Breadcrumbs::for('users_create', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Create', route('users.create'));
});



// Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });