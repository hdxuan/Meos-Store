<?php
return [
    'home' => [
        'title' => 'Dashboard',
        'name' => 'home',
        'icon' => 'fas fa-database',
        'link' => DOCUMENT_ROOT . "/admin/home"
    ],
    'cakes' => [
        'title' => 'Manage cakes',
        'name' => 'cakes',
        'icon' => 'fas fa-cookie-bite',
        'link' => DOCUMENT_ROOT . "/admin/cakes"
    ],
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
