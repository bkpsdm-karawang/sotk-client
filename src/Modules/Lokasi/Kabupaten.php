<?php

namespace SotkClient\Modules\Lokasi;

use SotkClient\Modules\ModuleAbstract;

class Kabupaten extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/kabupaten';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Lokasi\Kabupaten::class;
}
