<?php

namespace Larapacks\Administration\Http\Controllers\Setup;

use Illuminate\Support\Facades\Artisan;
use Larapacks\Administration\Http\Controllers\Controller;
use Larapacks\Administration\Seeders\RoleAndPermissionSeeder;

class MigrationController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('admin.setup.migrations');
    }

    /**
     * Displays the migration setup.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::setup.migrations.create');
    }

    /**
     * Performs migrations and seeds the database.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store()
    {
        if (Artisan::call('migrate') !== 0) {
            flash()->error('Error', 'There was an issue processing migrations.');

            return redirect()->back();
        }

        if (Artisan::call('db:seed', [
            '--class' => RoleAndPermissionSeeder::class,
        ]) !== 0) {
            flash()->error('Error', 'There was an issue seeding.');

            return redirect()->back();
        }

        return view('admin::setup.migrations.finished');
    }
}
