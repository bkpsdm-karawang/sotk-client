<?php

namespace SotkClient\Modules\Jabatan;

use BadMethodCallException;
use SotkClient\Modules\ModuleAbstract;

class Eselon extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/eselon';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Jabatan\Eselon::class;
}
