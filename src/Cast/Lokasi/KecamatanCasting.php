<?php

namespace SotkClient\Cast\Lokasi;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Lokasi\Kecamatan as KecamatanModel;

class KecamatanCasting implements BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = KecamatanModel::class;
}
