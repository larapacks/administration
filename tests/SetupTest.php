<?php

namespace Larapacks\Administration\Tests;

class SetupTest extends TestCase
{
    public function test_welcome()
    {
        $this->visit(route('admin.setup.index'))
            ->see('Setup');
    }

    public function test_migrate()
    {
        $this->visit(route('admin.setup.migrations.create'))
            ->submitForm('Begin')
            ->see('Completed');
    }

    public function test_account_creation()
    {
        $this->test_migrate();

        $inputs = [
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => 'Password123',
            'password_confirmation' => 'Password123',
        ];

        $this->visit(route('admin.setup.account.create'))
            ->submitForm('Complete Setup', $inputs)
            ->see('created');

        $this->seeInDatabase('users', array_except($inputs, [
            'password',
            'password_confirmation',
        ]));
    }
}
