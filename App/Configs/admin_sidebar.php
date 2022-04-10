<?php
return [
    'categories' => [
        'title' => 'Loại sản phẩm',
        'name' => 'categories',
        'icon' => 'fas fa-database',
        'link' => DOCUMENT_ROOT . "/admin/categories"
    ],
    'products' => [
        'title' => 'Sản phẩm',
        'name' => 'products', // là controller trên thanh địa chỉ
        // 'icon' => 'fas fa-cookie-bite',
        'icon' => 'fas fa-hamburger',
        'link' => DOCUMENT_ROOT . "/admin/products"
    ],

    'orders' => [
        'title' => 'Đơn hàng',
        'name' => 'orders',
        'icon' => 'fas fa-file-invoice-dollar',
        'link' => DOCUMENT_ROOT . "/admin/orders"
    ],

    'discounts' => [
        'title' => 'Khuyến mãi',
        'name' => 'discounts',
        'icon' => 'fa fa-percent',
        'link' => DOCUMENT_ROOT . "/admin/discounts"
    ],

    'comments' => [
        'title' => 'Bình luận',
        'name' => 'comments',
        'icon' => 'fas fa-comments',
        'link' => DOCUMENT_ROOT . "/admin/comments"
    ],
    'customer' => [
        'title' => 'Khách hàng',
        'name' => 'customer',
        'icon' => 'fas fa-users',
        'link' => DOCUMENT_ROOT . "/admin/customer"
    ],
    'staff' => [
        'title' => 'Nhân viên',
        'name' => 'staff',
        'icon' => 'fas fa-user-plus',
        'link' => DOCUMENT_ROOT . "/admin/staff"
    ],


];
