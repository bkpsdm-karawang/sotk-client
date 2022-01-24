<?php

namespace SotkClient\Models\Skpd;

use SotkClient\Models\Base;
use SotkClient\Models\Jabatan\Jabatan;

class Skpd Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'jabatan_kepala' => Jabatan::class,
    ];
}
