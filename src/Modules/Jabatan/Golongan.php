<?php

namespace SotkClient\Modules\Jabatan;

use BadMethodCallException;
use SotkClient\Modules\ModuleAbstract;

class Golongan extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/golongan';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Jabatan\Golongan::class;
}
