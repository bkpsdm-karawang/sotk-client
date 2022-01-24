<?php

namespace SotkClient\Models\Jabatan;

use SotkClient\Models\Base;

class KompetensiGroup Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'kompetensi' => Kompetensi::class.':collection'
    ];
}
