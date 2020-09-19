<?php

namespace SotkClient\Modules;

class Bupati extends AbstractModule
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/bupati';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Bupati::class;
}
