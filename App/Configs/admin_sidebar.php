<?php
return [
    // 'home' => [
    //     'title' => 'Dashboard',
    //     'name' => 'home',
    //     'icon' => 'fas fa-database',
    //     'link' => DOCUMENT_ROOT . "/admin/home"
    // ],
    'products' => [
        'title' => 'Sản phẩm',
        'name' => 'products', // là controller trên thanh địa chỉ
        // 'icon' => 'fas fa-cookie-bite',
        'icon' => 'fas fa-hamburger',
        'link' => DOCUMENT_ROOT . "/admin/products"
    ],

    'customer' => [
        'title' => 'Khách hàng',
        'name' => 'customer',
        'icon' => 'fas fa-users',
        'link' => DOCUMENT_ROOT . "/admin/customer"
    ],
    'orders' => [
        'title' => 'Đơn hàng',
        'name' => 'orders',
        'icon' => 'fas fa-file-invoice-dollar',
        'link' => DOCUMENT_ROOT . "/admin/orders"
    ],
];
