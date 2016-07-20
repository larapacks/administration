<?php

namespace Larapacks\Administration\Jobs\Admin\Setup;

use Larapacks\Administration\Http\Requests\SetupRequest;
use Larapacks\Administration\Jobs\Job;
use Larapacks\Administration\Models\Role;
use Larapacks\Administration\Models\User;

class Finish extends Job
{
    /**
     * @var SetupRequest
     */
    protected $request;

    /**
     * @var User
     */
    protected $user;

    /**
     * Constructor.
     *
     * @param SetupRequest $request
     * @param User         $user
     */
    public function __construct(SetupRequest $request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        $this->user->name = $this->request->input('name');
        $this->user->email = $this->request->input('email');
        $this->user->password = bcrypt($this->request->input('password'));

        $role = Role::whereName(Role::getAdministratorName())->firstOrFail();

        if ($this->user->save()) {
            $this->user->assignRole($role);

            return true;
        }

        return false;
    }
}
