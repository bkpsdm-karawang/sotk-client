<?php

namespace SotkClient\Models\Lokasi;

use SotkClient\Cast\Lokasi\KabupatenCasting;
use SotkClient\Models\Model;

class Kabupaten Extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'provinsi' => Provinsi::class,
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
        return KabupatenCasting::class;
    }
}
