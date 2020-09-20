<?php

namespace SotkClient\Modules\Pendidikan;

use SotkClient\Modules\ModuleAbstract;

class Jurusan extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/jurusan';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Pendidikan\Jurusan::class;
}
