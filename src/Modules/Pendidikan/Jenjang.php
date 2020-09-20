<?php

namespace SotkClient\Modules\Pendidikan;

use SotkClient\Modules\ModuleAbstract;

class Jenjang extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/jenjang';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Pendidikan\Jenjang::class;
}
