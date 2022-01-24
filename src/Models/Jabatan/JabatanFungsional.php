<?php

namespace SotkClient\Models\Jabatan;

use SotkClient\Models\Base;

class JabatanFungsional Extends Base implements ReferensiJabatanContract
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'jenis_jabatan_fungsional' => JabatanFungsionalJenis::class
    ];
}
