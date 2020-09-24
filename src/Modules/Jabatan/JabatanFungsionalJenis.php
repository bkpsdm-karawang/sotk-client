<?php

namespace SotkClient\Modules\Jabatan;

use SotkClient\Modules\ModuleAbstract;

class JabatanFungsionalJenis extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/jenis-jabatan-fungsional';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Jabatan\JabatanFungsionalJenis::class;
}
