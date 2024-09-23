<?php
return [
    'app' => [
        'title' => env('APP_NAME', 'test'),
        'description' => env('APP_NAME', 'test').' Description',
        'url' => 'http://google.com/',
        'dir' => 'ltr',
        'placeholder_image' => 'assets/backend/mXXXX',
        'key_words'=>'brands,digital,development',
        'page_templates' => [
            'contact-us' =>'Contact Us',
            'about-us'   =>'About Us',
            'products'   =>'Products',
            'categories' =>'Categories',
            'clients'    =>'Clients',
            'brands'     =>'brands',
        ]
    ],
     'admin' => [
        'name_length_limit' => 10,
        'prefixRoute' => env('ADMIN_PREFIX', 'admin'),
        'roles' => [
            'Administrator',
            'Employee',
        ],
        'permissions_moudles'=> [
            'role',
            'permission',
            'invoice',
            'admin',
            ]

    ],
];
