<?php

namespace Larapacks\Administration\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Larapacks\Administration\Seeders\RoleAndPermissionSeeder;
use Larapacks\Authorization\Authorization;

class AdminTestCase extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $user = Authorization::user()->newInstance();

        $user->forceFill([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'Password123',
        ]);

        $user->save();

        $this->artisan('db:seed', [
            '--class' => RoleAndPermissionSeeder::class,
        ]);

        $user->assignRole(Authorization::role()->first());

        $this->actingAs($user);
    }
}
