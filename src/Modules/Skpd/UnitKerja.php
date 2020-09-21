<?php

namespace SotkClient\Modules\Skpd;

use SotkClient\Modules\ModuleAbstract;

class UnitKerja extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/unit-kerja';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Skpd\UnitKerja::class;
}
