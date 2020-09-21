<?php

namespace SotkClient\Models\Lokasi;

use Illuminate\Contracts\Database\Eloquent\Castable;
use SotkClient\Cast\Lokasi\KabupatenCasting;
use SotkClient\Cast\Lokasi\ProvinsiCasting;
use SotkClient\Models\Model;

class Provinsi Extends Model implements Castable
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'kabupaten' => KabupatenCasting::class.':children',
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
        return ProvinsiCasting::class;
    }
}
