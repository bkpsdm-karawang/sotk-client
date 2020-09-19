<?php

namespace SotkClient\Modules\Lokasi;

use SotkClient\Modules\ModuleAbstract;

class Kecamatan extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/kecamatan';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Lokasi\Kecamatan::class;
}
