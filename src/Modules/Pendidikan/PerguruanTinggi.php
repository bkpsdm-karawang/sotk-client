<?php

namespace SotkClient\Modules\Pendidikan;

use SotkClient\Modules\ModuleAbstract;
use SotkClient\Modules\ModuleWriteContract;
use SotkClient\Modules\WriteTrait;

class PerguruanTinggi extends ModuleAbstract implements ModuleWriteContract
{
    use WriteTrait;

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
