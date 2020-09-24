<?php

namespace SotkClient\Models\Jabatan;

use Illuminate\Contracts\Database\Eloquent\Castable;
use SotkClient\Cast\Jabatan\JabatanFungsionalJenisCasting;
use SotkClient\Models\Model;

class JabatanFungsionalJenis extends Model implements Castable
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
        return JabatanFungsionalJenisCasting::class;
    }
}
