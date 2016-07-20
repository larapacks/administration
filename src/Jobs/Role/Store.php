<?php

namespace Larapacks\Administration\Jobs\Admin\Role;

use Larapacks\Administration\Http\Requests\Admin\RoleRequest;
use Larapacks\Administration\Jobs\Job;
use Larapacks\Administration\Models\Role;

class Store extends Job
{
    /**
     * @var RoleRequest
     */
    protected $request;

    /**
     * @var Role
     */
    protected $role;

    /**
     * Constructor.
     *
     * @param RoleRequest $request
     * @param Role        $role
     */
    public function __construct(RoleRequest $request, Role $role)
    {
        $this->request = $request;
        $this->role = $role;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        $this->role->name = $this->request->input('name');
        $this->role->label = $this->request->input('label');

        return $this->role->save();
    }
}
