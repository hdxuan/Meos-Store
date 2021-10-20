<?php
return [
    'home' => [
        'title' => 'Dashboard',
        'name' => 'home',
        'icon' => 'fas fa-database',
        'link' => DOCUMENT_ROOT . "/admin/home"
    ],
    'products' => [
        'title' => 'Manage products',
        'name' => 'products',
        'icon' => 'fas fa-cookie-bite',
        'link' => DOCUMENT_ROOT . "/admin/products"
    ],

    // 'products cat' => [
    //     'title' => 'Manage products cat',
    //     'name' => 'productscat', // là controller trên thanh địa chỉ
    //     'icon' => 'fas fa-cookie-bite',
    //     'link' => DOCUMENT_ROOT . "/admin/products/cat"
    // ],

    'categories' => [
        'title' => 'Manage categories',
        'name' => 'categories',
        'icon' => 'fas fa-border-all',
        'link' => DOCUMENT_ROOT . "/admin/categories"
    ],
    'orders' => [
        'title' => 'Manage orders',
        'name' => 'orders',
        'icon' => 'fas fa-chart-line',
        'link' => DOCUMENT_ROOT . "/admin/orders"
    ],
];
