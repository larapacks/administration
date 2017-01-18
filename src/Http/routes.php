<?php

/*
|--------------------------------------------------------------------------
| Administration Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the administration routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// The administration setup group.
Route::group(['prefix' => 'setup', 'as' => 'admin.setup.', 'namespace' => 'Setup'], function () {

    // The administration begin setup route.
    Route::get('/', [
        'as'    => 'index',
        'uses'  => 'WelcomeController@index',
    ]);

    Route::resource('migrations', 'MigrationController', [
        'only' => ['create', 'store'],
        'names' => [
            'create' => 'migrations.create',
            'store' => 'migrations.store',
        ],
    ]);

    Route::resource('account', 'AccountController', [
        'only' => ['create', 'store'],
        'names' => [
            'create' => 'account.create',
            'store' => 'account.store',
        ],
    ]);

});

Route::group(['as' => 'admin.', 'middleware' => ['admin.has-administrator']], function () {

    Route::group(['middleware' => ['admin.auth']], function () {

        Route::get('/', 'DashboardController@index')
            ->name('dashboard.index');

        // The users resource.
        Route::resource('users', 'UserController');

        // The user permissions resource.
        Route::resource('users.permissions', 'UserPermissionController', [
            'only' => ['store', 'destroy'],
        ]);

        // The user roles resource.
        Route::resource('users.roles', 'UserRoleController', [[
            'only' => ['store', 'destroy'],
        ]]);

        // The roles resource.
        Route::resource('roles', 'RoleController');

        // The role users resource.
        Route::resource('roles.users', 'RoleUserController', [
            'only' => ['store'],
        ]);

        // The role permissions resource.
        Route::resource('roles.permissions', 'RolePermissionController', [
            'only' => ['store', 'destroy'],
        ]);

        // The permissions resource.
        Route::resource('permissions', 'PermissionController', [
            'except' => ['create', 'store', 'destroy']
        ]);

        // The permission roles resource.
        Route::resource('permissions.roles', 'PermissionRoleController', [
            'only' => ['store'],
        ]);

        // The permission users resource.
        Route::resource('permissions.users', 'PermissionUserController', [
            'only' => ['store'],
        ]);
    });

    Route::group(['namespace' => 'Auth'], function () {
        // Authentication Routes...
        Route::get('login', 'LoginController@showLoginForm')
            ->name('auth.login');

        Route::post('login', 'LoginController@login')
            ->name('auth.login');

        Route::post('logout', 'LoginController@logout')
            ->name('auth.logout');

        // Password Reset Routes...
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')
            ->name('auth.password.reset');

        Route::post('password/reset', 'ResetPasswordController@reset')
            ->name('auth.password.reset');

        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')
            ->name('auth.password.reset.token');

        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
            ->name('auth.password.email');
    });

});

