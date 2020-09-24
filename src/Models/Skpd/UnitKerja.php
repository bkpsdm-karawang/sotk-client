<?php

namespace SotkClient\Models\Skpd;

use Illuminate\Contracts\Database\Eloquent\Castable;
use SotkClient\Cast\Skpd\UnitKerjaCasting;
use SotkClient\Models\Model;

class UnitKerja Extends Model implements Castable
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skpd' => Skpd::class,
        'parent' => UnitKerja::class,
        'sub_unit_kerja' => UnitKerja::class.':children',
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
        return UnitKerjaCasting::class;
    }
}
