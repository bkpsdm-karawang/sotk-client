<?php

namespace SotkClient\Modules\Pendidikan;

use SotkClient\Modules\ModuleAbstract;

class Tingkat extends ModuleAbstract
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'jurusan' => Jurusan::class.':collection',
    ];

    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/pendidikan/tingkat';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Pendidikan\Tingkat::class;
}
