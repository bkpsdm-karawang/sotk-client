<?php

namespace SotkClient\Models\Lokasi;

use SotkClient\Models\Base;

class Kecamatan Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'kabupaten' => Kabupaten::class,
        'desa' => Desa::class,
    ];
}
