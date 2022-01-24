<?php

namespace SotkClient\Models\Pendidikan;

class Sekolah Extends InstansiPendidikan
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'satuan' => Satuan::class,
        'tingkat' => Tingkat::class,
        'lembaga' => Lembaga::class
    ];
}
