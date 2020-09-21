<?php

namespace SotkClient\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \SotkClient\Client routes($callback = null, array $options = [])
 * @see \SotkClient\Laravel\Router
 */
class Route extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sotk.route';
    }
}
