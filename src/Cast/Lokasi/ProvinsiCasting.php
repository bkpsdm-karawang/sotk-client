<?php

namespace SotkClient\Cast\Lokasi;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Lokasi\Provinsi as ProvinsiModel;

class ProvinsiCasting implements BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = ProvinsiModel::class;
}
