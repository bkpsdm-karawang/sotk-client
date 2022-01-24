<?php

namespace SotkClient\Models\Lokasi;

use SotkClient\Models\Base;

class Kabupaten Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'provinsi' => Provinsi::class,
        'kecamatan' => Kecamatan::class.':collection',
    ];
}
