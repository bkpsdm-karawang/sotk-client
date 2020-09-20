<?php

namespace SotkClient\Models\Pendidikan;

use SotkClient\Models\Lokasi\Provinsi;
use SotkClient\Models\Lokasi\Kabupaten;
use SotkClient\Cast\Pendidikan\PerguruanTinggiCasting;
use SotkClient\Models\Model;

class PerguruanTinggi Extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'provinisi' => Provinsi::class,
        'kabupaten' => Kabupaten::class,
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
        return PerguruanTinggiCasting::class;
    }
}
