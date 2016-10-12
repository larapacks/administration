<?php

namespace Larapacks\Administration\Http\Controllers\Setup;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Larapacks\Administration\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('admin.setup.migrations');
    }

    /**
     * Displays the welcome page for setting up administration.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $default = $this->getDefaultConnection();

        $config = Config::get("database.connections.$default", [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => 'homestead',
            'username' => 'homestead',
            'password' => 'homestead',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]);

        $database = DB::connection()->getDatabaseName();

        try {
            $connected = is_array(DB::select('SHOW TABLES'));
        } catch (Exception $e) {
            $connected = false;
        }

        return view('admin::setup.welcome', compact(
            'database',
            'connected',
            'config'
        ));
    }


    /**
     * Returns the default database connection name.
     *
     * @return mixed
     */
    protected function getDefaultConnection()
    {
        return Config::get('database.default', 'mysql');
    }
}
