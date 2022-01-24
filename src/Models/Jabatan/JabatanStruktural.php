<?php

namespace SotkClient\Models\Jabatan;

use SotkClient\Models\Base;

class JabatanStruktural Extends Base implements ReferensiJabatanContract
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'eselon' => Eselon::class,
    ];
}
