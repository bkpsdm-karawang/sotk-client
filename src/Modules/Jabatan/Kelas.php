<?php

namespace SotkClient\Modules\Jabatan;

use SotkClient\Modules\ModuleAbstract;

class Kelas extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/kelas-jabatan';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Jabatan\Kelas::class;
}
