<?php

namespace Larapacks\Administration\Seeders;

use Illuminate\Database\Seeder;
use Larapacks\Authorization\Authorization;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * The roles to seed.
     *
     * @var array
     */
    protected $roles = [
        [
            'name'  => 'administrator',
            'label' => 'Administrator',
        ]
    ];

    /**
     * The permissions to seed.
     *
     * @var array
     */
    protected $permissions = [
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
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            Authorization::role()->firstOrCreate($role);
        }

        $permissions = [];

        foreach ($this->permissions as $permission) {
            $permissions[] = Authorization::permission()->firstOrCreate($permission);
        }

        Authorization::role()->first()->grant($permissions);
    }
}
