<?php


use Diglactic\Breadcrumbs\Breadcrumbs;


use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;






// Dashboard Super Admin
Breadcrumbs::for('dashboard_su', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('superadmin.index'));
});
// Dashboard  Admin
Breadcrumbs::for('dashboard_ad', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.index'));
});
// Dashboard  Operator
Breadcrumbs::for('dashboard_op', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('operator.index'));
});
// Dashboard  Read Only
Breadcrumbs::for('dashboard_re', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('readonly.index'));
});



// Akun 
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
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