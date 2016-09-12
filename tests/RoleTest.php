<?php

namespace Larapacks\Administration\Tests;

use Larapacks\Authorization\Authorization;

class RoleTest extends AdminTestCase
{
    public function test_role_index()
    {
        $this->visit(route('admin.roles.index'))
            ->see('Roles')
            ->see('Administrator');
    }

    public function test_role_create()
    {
        $role = [
            'name' => 'test-role',
            'label' => 'Test Role'
        ];

        $this->visit(route('admin.roles.create'))
            ->submitForm('Create', $role);

        $this->seeInDatabase('roles', $role);
    }

    public function test_role_show()
    {
        $role = Authorization::role()->first();

        $this->visit(route('admin.roles.show', [$role->id]))
            ->see('Administrator');
    }

    public function test_role_edit()
    {
        $role = Authorization::role()->first();

        $this->visit(route('admin.roles.edit', [$role->id]))
            ->submitForm('Save', [
                'label' => 'Testing',
            ])->see('Success');

        $this->seeInDatabase('roles', ['label' => 'Testing']);
    }
}
