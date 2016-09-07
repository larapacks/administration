<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;
use Larapacks\Administration\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:admin.users');
    }

    /**
     * Displays all users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
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
            flash()->success('Successfully created user.');

            return redirect()->route('admin.users.index');
        } else {
            flash()->error('There was an issue creating a user. Please try again.');

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
        $user = Authorization::user()->with(['roles', 'permissions'])->findOrFail($id);

        $withoutCurrentUser = function ($q) use ($user) {
            $q->whereId($user->id);
        };

        $roles = Authorization::role()
            ->whereDoesntHave('users', $withoutCurrentUser)
            ->get()
            ->pluck('label', 'id');

        $permissions =  Authorization::permission()
            ->whereDoesntHave('users', $withoutCurrentUser)
            ->get()
            ->pluck('label', 'id');

        return view('admin::users.show', compact('user', 'roles', 'permissions'));
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
        $user = Authorization::user()->findOrFail($id);

        return view('admin::users.edit', compact('user'));
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
        $user = Authorization::user()->findOrFail($id);

        if ($request->persist($user)) {
            flash()->success('Successfully updated user.');

            return redirect()->route('admin.users.show', [$id]);
        }

        flash()->error('There was an issue updating this user. Please try again.');

        return redirect()->route('admin.users.edit', [$id]);
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
        $user = Authorization::user()->findOrFail($id);

        // We need to prevent the delete request if the user being
        // deleted is the currently authenticated user.
        if ($user->getKey() == auth()->user()->getKey()) {
            flash()->important()->error('You cannot delete yourself.');

            return redirect()->back();
        }

        // We need to prevent the delete request if the current user being
        // deleted is the last administrator in the application.
        if ($user->isAdministrator() && Authorization::user()->whereHas('roles', function ($q) {
            $role = Authorization::role();

            $q->whereName($role::getAdministratorName());
        })->count() === 1) {
            flash()->important()->error('You cannot delete this account. No other administrator accounts exist.');

            return redirect()->back();
        }

        if ($user->delete()) {
            flash()->success('Successfully deleted user.');

            return redirect()->route('admin.users.index');
        } else {
            flash()->success('There was an issue deleting this user. Please try again.');

            return redirect()->back();
        }
    }
}
