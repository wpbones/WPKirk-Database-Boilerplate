<?php

if (!defined('ABSPATH')) {
  exit();
}

/*
|--------------------------------------------------------------------------
| Plugin Menus routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the menu routes for a plugin.
| In this context, the route are the menu link.
|
*/

return [
  'wp_kirk_slug_menu' => [
    "page_title" => "Database",
    "menu_title" => "Database",
    'capability' => 'read',
    'icon' => 'wpbones-logo-menu.png',
    'items' => [
      [
        "page_title" => "DB",
        "menu_title" => "DB",
        'capability' => 'read',
        'route' => [
          'get' => 'Examples\DatabaseController@db'
        ],
      ],
      [
        "page_title" => "Model",
        "menu_title" => "Model",
        'capability' => 'read',
        'route' => [
          'get' => 'Examples\DatabaseController@simpleModel'
        ],
      ],
      [
        "page_title" => "Model NoPrefix",
        "menu_title" => "Model NoPrefix",
        'capability' => 'read',
        'route' => [
          'get' => 'Examples\DatabaseController@noPrefixModel'
        ],
      ],
      [
        "page_title" => "Eloquent ORM",
        "menu_title" => "Eloquent ORM",
        'capability' => 'read',
        'route' => [
          'get' => 'Examples\DatabaseController@eloquent'
        ],
      ],
    ]
  ]
];
