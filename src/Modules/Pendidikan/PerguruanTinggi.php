<?php

namespace SotkClient\Modules\Pendidikan;

use SotkClient\Modules\ModuleAbstract;

class PerguruanTinggi extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/perguruan-tinggi';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Pendidikan\PerguruanTinggi::class;
}
