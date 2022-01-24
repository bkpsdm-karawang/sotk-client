<?php

namespace SotkClient\Models\Pendidikan;

use SotkClient\Models\Base;

class InstansiPendidikan Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'satuan' => Satuan::class,
        'lembaga' => Lembaga::class
    ];
}
