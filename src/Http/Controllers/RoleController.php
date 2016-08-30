<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Administration\Http\Requests\RoleRequest;
use Larapacks\Administration\Processors\Admin\RoleProcessor;
use Larapacks\Administration\Exceptions\Admin\CannotDeleteAdministratorRole;
use Larapacks\Authorization\Authorization;

class RoleController extends Controller
{
    /**
     * Displays all roles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('admin.roles.index');

        $roles = Authorization::role()->paginate();

        return view('admin::roles.index', compact('roles'));
    }

    /**
     * Displays the form for creating a new role.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('admin.roles.create');

        return view('admin::roles.create');
    }

    /**
     * Creates a new role.
     *
     * @param RoleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('admin.roles.create');

        $role = Authorization::role()->newInstance();

        if ($request->persist($role)) {
            flash()->success('Success!', 'Successfully created role.');

            return redirect()->route('admin.roles.index');
        } else {
            flash()->error('Error!', 'There was an issue creating a role. Please try again.');

            return redirect()->route('admin.roles.create');
        }
    }

    /**
     * Displays the specified role.
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $this->authorize('admin.roles.show');

        $role = Authorization::role()->with(['users', 'permissions'])->findOrFail($id);

        $users = Authorization::user()->whereDoesntHave('roles', function ($q) use ($role) {
            return $q->whereName($role->name);
        })->get();

        $permissions = Authorization::permission()->whereDoesntHave('roles', function ($q) use ($role) {
            return $q->whereName($role->name);
        })->get();

        return view('admin::roles.show', compact('role', 'users', 'permissions'));
    }

    /**
     * Displays the form for editing the specified role.
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return $this->processor->edit($id);
    }

    /**
     * Updates the specified role.
     *
     * @param RoleRequest $request
     * @param int|string  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, $id)
    {
        if ($this->processor->update($request, $id)) {
            flash()->success('Success!', 'Successfully updated role.');

            return redirect()->route('admin.roles.show', [$id]);
        } else {
            flash()->error('Error!', 'There was an issue updating this role. Please try again.');

            return redirect()->route('admin.roles.edit', [$id]);
        }
    }

    /**
     * Deletes the specified role.
     *
     * @param int|string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            if ($this->processor->destroy($id)) {
                flash()->success('Success!', 'Successfully deleted role.');

                return redirect()->route('admin.roles.index');
            } else {
                flash()->error('Error!', 'There was an issue deleting this role. Please try again.');

                return redirect()->route('admin.roles.show', [$id]);
            }
        } catch (CannotDeleteAdministratorRole $e) {
            flash()->setTimer(null)->error('Error!', $e->getMessage());

            return redirect()->route('admin.roles.show', [$id]);
        }
    }
}
