<?php

namespace Larapacks\Administration;

use Illuminate\Support\Facades\Route;

class Menu
{
    /**
     * Compare given route with current route and return output if they match.
     *
     * @param string $route
     * @param string $output
     *
     * @return null|string
     */
    public static function isActiveRoute($route, $output = 'is-active')
    {
        return Route::currentRouteName() == $route ? $output : null;
    }

    /**
     * Compares the given routes with current route and return output if they match.
     *
     * @param array $routes
     * @param string $output
     *
     * @return string
     */
    public static function areActiveRoutes(array $routes, $output = 'is-active')
    {
        foreach ($routes as $route) {
            if (self::isActiveRoute($route)) {
                return $output;
            }
        }
    }
}
