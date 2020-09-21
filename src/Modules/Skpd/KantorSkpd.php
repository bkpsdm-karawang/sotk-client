<?php

namespace SotkClient\Modules\Skpd;

use SotkClient\Modules\ModuleAbstract;

class KantorSkpd extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/kantor-skpd';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Skpd\KantorSkpd::class;
}
