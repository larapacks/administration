<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The title of the Administration backend to display.
    |
    */

    'title' => 'Administration',

    /*
    |--------------------------------------------------------------------------
    | Prefix
    |--------------------------------------------------------------------------
    |
    | This option allows you to configure the route
    | prefix to access the administration panel.
    |
    */

    'prefix' => 'admin',

    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    |
    | This option allows you to configure the roles that are created upon
    | setup. These roles will not be able to be deleted
    | through the administrator interface.
    |
    | By default, the first role in this list will
    | be given **all** permissions listed below.
    |
    */

    'roles' => [
        [
            'name'  => 'administrator',
            'label' => 'Administrator',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    |
    | This option allows you to configure the permissions that are created upon
    | setup. These permissions will not be able to be deleted
    | through the administrator interface.
    |
    | The below permission cannot be modified, but you may
    | add as many new permissions as you'd like.
    |
    */

    'permissions' => [
        [
            'name'  => 'admin',
            'label' => 'Access Administration',
        ],
        [
            'name'  => 'admin.users',
            'label' => 'Manage Users',
        ],
        [
            'name'  => 'admin.roles',
            'label' => 'Manage Roles',
        ],
        [
            'name'  => 'admin.permissions',
            'label' => 'Manage Permissions',
        ],
    ]

];
