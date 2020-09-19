<?php

namespace SotkClient\Modules\Lokasi;

use SotkClient\Modules\ModuleAbstract;

class Provinsi extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/provinsi';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Lokasi\Provinsi::class;
}
