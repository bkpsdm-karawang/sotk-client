<?php

namespace SotkClient\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \SotkClient\Modules\ModuleWriteContract module(string $module)
 * @see \SotkClient\Client
 */
class SotkClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sotk.client';
    }
}
