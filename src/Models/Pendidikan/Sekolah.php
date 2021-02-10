<?php

namespace SotkClient\Models\Pendidikan;

use Illuminate\Contracts\Database\Eloquent\Castable;
use SotkClient\Cast\Pendidikan\SekolahCasting;

class Sekolah Extends InstansiPendidikan implements Castable
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

    /**
     * Get the name of the caster class to use when casting from / to this cast target.
     *
     * @param  array  $arguments
     * @return string
     * @return string|\Illuminate\Contracts\Database\Eloquent\CastsAttributes|\Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes
     */
    public static function castUsing(array $arguments)
    {
        return SekolahCasting::class;
    }
}
