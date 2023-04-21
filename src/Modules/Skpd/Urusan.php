<?php

namespace SotkClient\Modules\Skpd;

use SotkClient\Modules\ModuleAbstract;

class Urusan extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/urusan';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Skpd\Urusan::class;
}
