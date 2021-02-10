<?php

namespace SotkClient\Models\Pendidikan;

use Illuminate\Contracts\Database\Eloquent\Castable;
use SotkClient\Cast\Pendidikan\InstansiPendidikanCasting;
use SotkClient\Models\Model;

abstract class InstansiPendidikan Extends Model implements Castable
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'satuan' => Satuan::class,
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
        return InstansiPendidikanCasting::class;
    }
}
