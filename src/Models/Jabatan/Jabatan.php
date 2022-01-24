<?php

namespace SotkClient\Models\Jabatan;

use SotkClient\Casts\ReferensiJabatan;
use SotkClient\Models\Skpd\Skpd;
use SotkClient\Models\Skpd\UnitKerja;
use SotkClient\Models\Base;

class Jabatan Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skpd' => Skpd::class,
        'unit_kerja' => UnitKerja::class,
        'referensi' => ReferensiJabatan::class,
    ];
}
