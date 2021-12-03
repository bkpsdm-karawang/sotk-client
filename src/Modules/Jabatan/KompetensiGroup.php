<?php

namespace SotkClient\Modules\Jabatan;

use SotkClient\Modules\ModuleAbstract;

class KompetensiGroup extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/kompetensi-group';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Jabatan\KompetensiGroup::class;
}
