<?php

namespace Larapacks\Administration\Tests;

use Illuminate\Support\Facades\Schema;
use Larapacks\Authorization\Tests\Stubs\User;
use Larapacks\Authorization\Tests\Stubs\Role;
use Larapacks\Authorization\Tests\Stubs\Permission;
use Larapacks\Authorization\AuthorizationServiceProvider;
use Larapacks\Administration\AdministrationServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->artisan('vendor:publish');

        $this->createUsersTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            AuthorizationServiceProvider::class,
            AdministrationServiceProvider::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('authorization.user', User::class);
        $app['config']->set('authorization.role', Role::class);
        $app['config']->set('authorization.permission', Permission::class);
    }

    protected function createUsersTable()
    {
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
