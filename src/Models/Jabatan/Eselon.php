<?php

namespace SotkClient\Models\Jabatan;

use SotkClient\Models\Base;

class Eselon Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tingkat' => Tingkat::class
    ];
}
