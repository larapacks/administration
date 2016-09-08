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
            ->seeInSession('flash_notification.level', 'danger');
    }

    protected function createUser(array $attributes = [])
    {
        $attributes = count($attributes) == 0 ? [
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('testing123'),
        ] : $attributes;

        $user = Authorization::user();

        $user->forceFill($attributes);

        $user->save();

        return $user;
    }
}
