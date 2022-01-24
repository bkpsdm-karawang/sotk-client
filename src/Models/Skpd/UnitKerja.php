<?php

namespace SotkClient\Models\Skpd;

use SotkClient\Models\Base;
use SotkClient\Models\Jabatan\Jabatan;

class UnitKerja Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skpd' => Skpd::class,
        'ancestors' => UnitKerja::class.':collection',
        'descendants' => UnitKerja::class.':collection',
        'parent' => UnitKerja::class,
        'children' => UnitKerja::class.':collection',
        'jabatan_kepala' => Jabatan::class,
    ];
}
