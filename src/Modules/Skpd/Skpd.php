<?php

namespace SotkClient\Modules\Skpd;

use SotkClient\Modules\ModuleAbstract;

class Skpd extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/skpd';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Skpd\Skpd::class;
}
