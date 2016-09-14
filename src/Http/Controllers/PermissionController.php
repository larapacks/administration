<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;
use Larapacks\Administration\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:admin.permissions');
    }

    /**
     * Displays all permissions.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $permissions = Authorization::permission()->paginate();

        return view('admin::permissions.index', compact('permissions'));
    }

    /**
     * Displays the specified permission.
     *
     * @param int|string $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $permission = Authorization::permission()->with(['users', 'roles'])->findOrFail($id);

        $users = Authorization::user()->whereDoesntHave('permissions', function ($q) use ($permission) {
            return $q->whereName($permission->name);
        })->get();

        $roles = Authorization::role()->whereDoesntHave('permissions', function ($q) use ($permission) {
            return $q->whereName($permission->name);
        })->get();

        return view('admin::permissions.show', compact('permission', 'users', 'roles'));
    }

    /**
     * Displays the form for editing the specified permission.
     *
     * @param int|string $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $permission = Authorization::permission()->findOrFail($id);

        return view('admin::permissions.edit', compact('permission'));
    }

    /**
     * Updates the specified permission.
     *
     * @param PermissionRequest $request
     * @param int|string        $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission = Authorization::permission()->findOrFail($id);

        if ($request->persist($permission)) {
            flash()->success('Successfully updated permission.');

            return redirect()->route('admin.permissions.show', [$id]);
        } else {
            flash()->error('There was an error updating this permission. Please try again.');

            return redirect()->route('admin.permissions.edit', [$id]);
        }
    }
}
