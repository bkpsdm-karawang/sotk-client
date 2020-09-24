<?php

namespace SotkClient\Modules\Jabatan;

use SotkClient\Modules\ModuleAbstract;

class JabatanPelaksanaJenis extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/jenis-jabatan-pelaksana';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Jabatan\JabatanPelaksanaJenis::class;
}
