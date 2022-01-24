<?php

namespace SotkClient\Models\Lokasi;

use SotkClient\Models\Base;

class Provinsi Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'kabupaten' => Kabupaten::class.':collection',
    ];
}
