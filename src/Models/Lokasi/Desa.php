<?php

namespace SotkClient\Models\Lokasi;

use SotkClient\Models\Base;

class Desa Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'kecamatan' => Kecamatan::class,
    ];
}
