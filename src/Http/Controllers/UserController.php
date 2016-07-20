<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Administration\Http\Requests\UserRequest;
use Larapacks\Administration\Processors\Admin\UserProcessor;

use Larapacks\Administration\Exceptions\Admin\CannotRemoveRolesException;
use Larapacks\Authorization\Authorization;

class UserController extends Controller
{
    /**
     * Displays all users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('admin.users.index');

        $users = Authorization::user()->paginate();

        return view('admin::users.index', compact('users'));
    }

    /**
     * Displays the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('admin.users.create');

        return view('admin::users.create');
    }

    /**
     * Creates a new user.
     *
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        if ($request->persist(Authorization::user())) {
            flash()->success('Success!', 'Successfully created user.');

            return redirect()->route('admin.users.index');
        } else {
            flash()->error('Error!', 'There was an issue creating a user. Please try again.');

            return redirect()->route('admin.users.create');
        }
    }

    /**
     * Displays the specified user.
     *
     * @param int|string $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $this->authorize('admin.users.show');

        $user = Authorization::user()->with(['roles', 'permissions'])->findOrFail($id);

        $permissions =  Authorization::permission()->whereDoesntHave('users', function ($q) use ($user) {
            $q->whereId($user->id);
        })->get()->pluck('label', 'id');

        return view('admin::users.show', compact('user', 'permissions'));
    }

    /**
     * Displays the form for editing the specified user.
     *
     * @param int|string $id
     *
     * @return \Illuminate\View\View|void
     */
    public function edit($id)
    {
        return $this->processor->edit($id);
    }

    /**
     * Updates the specified user.
     *
     * @param UserRequest $request
     * @param int|string  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        try {
            if ($this->processor->update($request, $id)) {
                flash()->success('Success!', 'Successfully updated user.');

                return redirect()->route('admin.users.show', [$id]);
            } else {
                flash()->error('Error!', 'There was an issue updating this user. Please try again.');

                return redirect()->route('admin.users.edit', [$id]);
            }
        } catch (CannotRemoveRolesException $e) {
            flash()->setTimer(null)->error('Error!', $e->getMessage());

            return redirect()->route('admin.users.edit', [$id]);
        }
    }

    /**
     * Deletes the specified user.
     *
     * @param int|string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($this->processor->destroy($id)) {
            flash()->success('Success!', 'Successfully deleted user.');

            return redirect()->route('admin.users.index');
        } else {
            flash()->success('Success!', 'There was an issue deleting this user. Please try again.');

            return redirect()->route('admin.users.show', [$id]);
        }
    }
}
