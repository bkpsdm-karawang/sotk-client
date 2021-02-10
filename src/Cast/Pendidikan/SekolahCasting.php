<?php

namespace SotkClient\Cast\Pendidikan;

use SotkClient\Cast\Pendidikan\InstansiPendidikanCasting;
use SotkClient\Models\Pendidikan\Sekolah as SekolahModel;

class SekolahCasting extends InstansiPendidikanCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = SekolahModel::class;
}
