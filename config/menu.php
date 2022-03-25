<?php

return [
    [
        'label' => 'Dashboard',
        'route' => 'admin',
        'icon' => 'fa-home',
    ],
    [
        'label' => 'Product Manager',
        'route' => 'products.index',
        'icon' => 'fa-shopping-cart',
        'items' => [
            [
                'label' => 'All Product',
                'route' => 'products.index',
            ],
            [
                'label' => 'Add Product',
                'route' => 'products.create',
            ],
        ]
    ],
    [
        'label' => 'Category Manager',
        'route' => 'categories.index',
        'icon' => 'fa-shopping-cart',
        'items' => [
            [
                'label' => 'All Category',
                'route' => 'categories.index',
            ],
            [
                'label' => 'Add Category',
                'route' => 'categories.create',
            ],
        ]
    ],
    [
        'label' => 'Blog Manager',
        'route' => 'blogs.index',
        'icon' => 'fa-folder-open',
        'items' => [
            [
                'label' => 'All Blog',
                'route' => 'blogs.index',
            ],
            [
                'label' => 'Add Blog',
                'route' => 'blogs.create',
            ],
        ]
    ],
    [
        'label' => 'Order Manager',
        'route' => 'banner.index',
        'icon' => 'fa-image',
        'items' => [
            [
                'label' => 'All Order',
                'route' => 'banner.index',
            ],
            [
                'label' => 'Add Order',
                'route' => 'banner.create',
            ],
        ]
    ],
    [
        'label' => 'Account Manager',
        'route' => 'accounts.index',
        'icon' => 'fa-user',
    ],
    [
        'label' => 'File Manager',
        'route' => 'admin.file',
        'icon' => 'fa-image',
    ],
];
