<?php

namespace Larapacks\Administration\Tests;


class UserTest extends AdminTestCase
{
    public function test_user_index()
    {
        $this->call('GET', route('admin.users.index'))
            ->assertResponseOk();
    }
}
