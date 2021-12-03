<?php

namespace SotkClient\Cast\Jabatan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Jabatan\Kompetensi as KompetensiModel;

class KompetensiCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = KompetensiModel::class;
}
