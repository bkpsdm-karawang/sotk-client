<?php

namespace SotkClient\Models\Skpd;

use SotkClient\Models\Base;

class KantorSkpd Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skpd' => Skpd::class,
        'unit_kerja' => UnitKerja::class,
    ];
}
