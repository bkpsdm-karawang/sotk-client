<?php

namespace SotkClient\Modules\Jabatan;

use SotkClient\Modules\ModuleAbstract;

class Kompetensi extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/kompetensi';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Jabatan\Kompetensi::class;
}
