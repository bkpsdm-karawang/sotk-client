<?php

namespace SotkClient\Models\Pendidikan;

use SotkClient\Models\Base;

class Jurusan Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tingkat' => Tingkat::class.':collection',
    ];
}
