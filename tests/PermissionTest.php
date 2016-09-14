<?php

namespace Larapacks\Administration\Tests;

use Larapacks\Authorization\Authorization;

class PermissionTest extends AdminTestCase
{
    public function test_permissions_index()
    {
        $this->visit(route('admin.permissions.index'))
            ->see('Permissions');
    }

    public function test_permissions_create()
    {
        $permission = [
            'name' => 'permission',
            'label' => 'Permission',
        ];

        $this->visit(route('admin.permissions.create'))
            ->submitForm('Create', $permission);

        $this->seeInDatabase('permissions', $permission);
    }

    public function test_permission_show()
    {
        $permission = Authorization::permission()->first();

        $this->visit(route('admin.permissions.show', [$permission->id]))
            ->see($permission->label);
    }
}
