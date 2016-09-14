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

    public function test_permission_show()
    {
        $permission = Authorization::permission()->first();

        $this->visit(route('admin.permissions.show', [$permission->id]))
            ->see($permission->label);
    }

    public function test_permission_edit()
    {
        $permission = Authorization::permission()->first();

        $input = ['label' => 'Testing'];

        $this->visit(route('admin.permissions.edit', [$permission->id]))
            ->submitForm('Save', $input);

        $this->seeInDatabase('permissions', $input);
    }

    public function test_permission_edit_cannot_change_name()
    {
        $permission = Authorization::permission()->first();

        $input = [
            'name' => 'New Name',
            'label' => 'Testing',
        ];

        $this->visit(route('admin.permissions.edit', [$permission->id]))
            ->submitForm('Save', $input);

        $this->seeInDatabase('permissions', ['label' => 'Testing']);
    }
}
