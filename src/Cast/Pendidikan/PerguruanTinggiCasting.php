<?php

namespace SotkClient\Cast\Pendidikan;

use SotkClient\Cast\Pendidikan\InstansiPendidikanCasting;
use SotkClient\Models\Pendidikan\PerguruanTinggi as PerguruanTinggiModel;

class PerguruanTinggiCasting extends InstansiPendidikanCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = PerguruanTinggiModel::class;
}
