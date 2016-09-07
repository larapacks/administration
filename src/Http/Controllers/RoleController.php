<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;
use Larapacks\Administration\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:admin.roles');
    }

    /**
     * Displays all roles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
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
        $role = Authorization::role()->newInstance();

        if ($request->persist($role)) {
            flash()->success('Successfully created role.');

            return redirect()->route('admin.roles.index');
        } else {
            flash()->error('There was an issue creating a role. Please try again.');

            return redirect()->route('admin.roles.create');
        }
    }

    /**
     * Displays the specified role.
     *
     * @param int||string $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $role = Authorization::role()->findOrFail($id);

        $roleUsers = $role->users()->paginate(10, ['*'], 'users');

        $rolePermissions = $role->permissions()->paginate(10, ['*'], 'permissions');

        $users = Authorization::user()->whereDoesntHave('roles', function ($q) use ($role) {
            return $q->whereName($role->name);
        })->get();

        $permissions = Authorization::permission()->whereDoesntHave('roles', function ($q) use ($role) {
            return $q->whereName($role->name);
        })->get();

        return view('admin::roles.show', compact(
            'role',
            'roleUsers',
            'rolePermissions',
            'users',
            'permissions'
        ));
    }

    /**
     * Displays the form for editing the specified role.
     *
     * @param int||string $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Authorization::role()->findOrFail($id);

        return view('admin::roles.edit', compact('role'));
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
        $role = Authorization::role()->findOrFail($id);

        if ($request->persist($role)) {
            flash()->success('Successfully updated role.');

            return redirect()->route('admin.roles.show', [$id]);
        } else {
            flash()->error('There was an issue updating this role. Please try again.');

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
        $role = Authorization::role()->findOrFail($id);

        if ($role->isAdministrator()) {
            flash()->important()->error('You cannot delete the administrator role.');
        } elseif ($role->delete()) {
            flash()->success('Successfully deleted role.');
        } else {
            flash()->error('There was an issue deleting this role. Please try again.');
        }

        return redirect()->back();
    }
}
