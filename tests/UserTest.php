<?php

namespace Larapacks\Administration\Tests;

use Illuminate\Support\Facades\Auth;
use Larapacks\Authorization\Authorization;

class UserTest extends AdminTestCase
{
    public function test_user_index()
    {
        $this->visit(route('admin.users.index'))
            ->see('Users')
            ->see(Auth::user()->name);
    }

    public function test_user_create()
    {
        $user = [
            'name' => 'John Doe',
            'email' => 'jdoe@example.com',
            'password' => 'Password123',
            'password_confirmation' => 'Password123',
        ];

        $this->visit(route('admin.users.create'))
            ->submitForm('Create', $user);

        $this->seeInDatabase('users', array_except($user, [
            'password',
            'password_confirmation',
        ]));
    }

    public function test_user_show()
    {
        $user = $this->createUser();

        $this->visit(route('admin.users.show', [$user->id]))
            ->see($user->name)
            ->see('Delete');
    }

    public function test_user_show_for_current_user()
    {
        $this->visit(route('admin.users.show', [Auth::user()->id]))
            ->see('Administrator')
            ->dontSee('Delete');
    }

    public function test_user_edit()
    {
        $this->visit(route('admin.users.edit', [Auth::user()->id]))
            ->submitForm('Save', [
                'name' => 'Testing',
                'email' => 'testing@example.com',
            ])
            ->see('updated user')
            ->see('Testing')
            ->see('testing@example.com');
    }

    public function test_user_delete()
    {
        $user = $this->createUser();

        $this->delete(route('admin.users.destroy', [$user->id]))
            ->assertRedirectedToRoute('admin.users.index');
    }

    public function test_user_delete_cannot_delete_self()
    {
        $this->delete(route('admin.users.destroy', [Auth::user()->id]))
            ->seeInSession('flash_notification.message')
            ->seeInSession('flash_notification.level', 'danger')
            ->seeStatusCode(302);
    }

    public function test_user_is_unauthorized()
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)
            ->call('GET', route('admin.users.index'));

        $this->assertEquals(403, $response->getStatusCode());
    }

    public function test_cannot_remove_only_administrator()
    {
        $role = Authorization::role()->whereName('administrator')->first();

        $this->delete(route('admin.users.roles.destroy', [Auth::user()->id, $role->id]))
            ->seeInSession('flash_notification.message')
            ->seeInSession('flash_notification.level', 'danger')
            ->seeStatusCode(302);
    }
}
