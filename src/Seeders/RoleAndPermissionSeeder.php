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
            'name'  => 'admin.welcome.index',
            'label' => 'View Administrator Welcome',
        ],
        [
            'name'  => 'admin.users.index',
            'label' => 'View All Users',
        ],
        [
            'name'  => 'admin.users.create',
            'label' => 'Create Users',
        ],
        [
            'name'  => 'admin.users.edit',
            'label' => 'Edit Users',
        ],
        [
            'name'  => 'admin.users.show',
            'label' => 'View Users',
        ],
        [
            'name'  => 'admin.users.destroy',
            'label' => 'Delete Users',
        ],
        [
            'name'  => 'admin.roles.index',
            'label' => 'View All Roles',
        ],
        [
            'name'  => 'admin.roles.create',
            'label' => 'Create Roles',
        ],
        [
            'name'  => 'admin.roles.edit',
            'label' => 'Edit Roles',
        ],
        [
            'name'  => 'admin.roles.show',
            'label' => 'View Roles',
        ],
        [
            'name'  => 'admin.roles.destroy',
            'label' => 'Delete Roles',
        ],
        [
            'name'  => 'admin.permissions.index',
            'label' => 'View All Permissions',
        ],
        [
            'name'  => 'admin.permissions.create',
            'label' => 'Create Permissions',
        ],
        [
            'name'  => 'admin.permissions.edit',
            'label' => 'Edit Permissions',
        ],
        [
            'name'  => 'admin.permissions.show',
            'label' => 'View Permissions',
        ],
        [
            'name'  => 'admin.permissions.destroy',
            'label' => 'Delete Permissions',
        ],
        [
            'name'  => 'admin.users.permissions.store',
            'label' => 'Add Permissions to Users',
        ],
        [
            'name'  => 'admin.users.permissions.destroy',
            'label' => 'Remove Permissions from Users',
        ],
        [
            'name'  => 'admin.roles.permissions.store',
            'label' => 'Add Permissions to Roles',
        ],
        [
            'name'  => 'admin.roles.permissions.destroy',
            'label' => 'Remove Permissions from Roles',
        ],
        [
            'name'  => 'admin.roles.users.store',
            'label' => 'Add Users to Roles',
        ],
        [
            'name'  => 'admin.roles.users.destroy',
            'label' => 'Remove Users from Roles',
        ]
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
