<?php

namespace SotkClient\Models\Jabatan;

use SotkClient\Models\Base;

class Kompetensi Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'group' => KompetensiGroup::class.':collection'
    ];
}
