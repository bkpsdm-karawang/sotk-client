<?php

namespace SotkClient\Modules\Lokasi;

use SotkClient\Modules\ModuleAbstract;

class Desa extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/desa';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Lokasi\Desa::class;
}
