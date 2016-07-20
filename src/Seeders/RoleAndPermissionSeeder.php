<?php

namespace Larapacks\Administration\Seeders;

use Illuminate\Database\Seeder;
use Larapacks\Administration\Models\Role;
use Larapacks\Administration\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $administrator = Role::firstOrCreate([
            'name'  => 'administrator',
            'label' => 'Administrator',
        ]);

        // Welcome Permissions
        Permission::firstOrCreate([
            'name'  => 'admin.welcome.index',
            'label' => 'View Administrator Welcome',
        ]);

        // User Permissions
        Permission::firstOrCreate([
            'name'  => 'admin.users.index',
            'label' => 'View All Users',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.users.create',
            'label' => 'Create Users',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.users.edit',
            'label' => 'Edit Users',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.users.show',
            'label' => 'View Users',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.users.destroy',
            'label' => 'Delete Users',
        ]);

        // Role Permissions
        Permission::firstOrCreate([
            'name'  => 'admin.roles.index',
            'label' => 'View All Roles',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.roles.create',
            'label' => 'Create Roles',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.roles.edit',
            'label' => 'Edit Roles',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.roles.show',
            'label' => 'View Roles',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.roles.destroy',
            'label' => 'Delete Roles',
        ]);

        // Permission Permissions
        Permission::firstOrCreate([
            'name'  => 'admin.permissions.index',
            'label' => 'View All Permissions',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.permissions.create',
            'label' => 'Create Permissions',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.permissions.edit',
            'label' => 'Edit Permissions',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.permissions.show',
            'label' => 'View Permissions',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.permissions.destroy',
            'label' => 'Delete Permissions',
        ]);

        // User Permission Permissions
        Permission::firstOrCreate([
            'name'  => 'admin.users.permissions.store',
            'label' => 'Add Permissions to Users',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.users.permissions.destroy',
            'label' => 'Remove Permissions from Users',
        ]);

        // Role Permission Permissions
        Permission::firstOrCreate([
            'name'  => 'admin.roles.permissions.store',
            'label' => 'Add Permissions to Roles',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.roles.permissions.destroy',
            'label' => 'Remove Permissions from Roles',
        ]);

        // Role User Permissions
        Permission::firstOrCreate([
            'name'  => 'admin.roles.users.store',
            'label' => 'Add Users to Roles',
        ]);

        Permission::firstOrCreate([
            'name'  => 'admin.roles.users.destroy',
            'label' => 'Remove Users from Roles',
        ]);

        $administrator->grant(Permission::all());
    }
}
