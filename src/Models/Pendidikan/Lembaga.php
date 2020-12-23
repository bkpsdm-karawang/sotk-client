<?php

namespace SotkClient\Models\Pendidikan;

use Illuminate\Contracts\Database\Eloquent\Castable;
use SotkClient\Cast\Pendidikan\LembagaCasting;
use SotkClient\Models\Model;

class Lembaga Extends Model implements Castable
{
    /**
     * Get the name of the caster class to use when casting from / to this cast target.
     *
     * @param  array  $arguments
     * @return string
     * @return string|\Illuminate\Contracts\Database\Eloquent\CastsAttributes|\Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes
     */
    public static function castUsing(array $arguments)
    {
        return LembagaCasting::class;
    }
}
