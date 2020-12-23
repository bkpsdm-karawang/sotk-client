<?php

namespace SotkClient\Modules\Pendidikan;

use SotkClient\Modules\ModuleAbstract;

class Satuan extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/pendidikan/satuan';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Pendidikan\Satuan::class;
}
