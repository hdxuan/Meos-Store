<?php
return [
    'home' => [
        'title' => 'Dashboard',
        'name' => 'home',
        'icon' => 'fas fa-database',
        'link' => DOCUMENT_ROOT . "/admin/home"
    ],
    'products' => [
        'title' => 'Sản phẩm',
        'name' => 'products', // là controller trên thanh địa chỉ
        // 'icon' => 'fas fa-cookie-bite',
        'icon' => 'fas fa-hamburger',
        'link' => DOCUMENT_ROOT . "/admin/products"
    ],

    // 'products cat' => [
    //     'title' => 'Manage products cat',
    //     'name' => 'productscat', 
    //     'icon' => 'fas fa-cookie-bite',
    //     'link' => DOCUMENT_ROOT . "/admin/products/cat"
    // ],

    'user' => [
        'title' => 'Khách hàng',
        'name' => 'user',
        'icon' => 'fas fa-users',
        'link' => DOCUMENT_ROOT . "/admin/categories"
    ],
    'orders' => [
        'title' => 'Đơn hàng',
        'name' => 'orders',
        'icon' => 'fas fa-file-invoice-dollar',
        'link' => DOCUMENT_ROOT . "/admin/orders"
    ],
];
