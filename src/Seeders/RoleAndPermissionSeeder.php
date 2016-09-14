<?php

namespace Larapacks\Administration\Seeders;

use Illuminate\Database\Seeder;
use Larapacks\Authorization\Authorization;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('admin.roles', []) as $role) {
            Authorization::role()->firstOrCreate($role);
        }

        $permissions = [];

        foreach (config('admin.permissions', []) as $permission) {
            $permissions[] = Authorization::permission()->firstOrCreate($permission);
        }

        Authorization::role()->first()->grant($permissions);
    }
}
