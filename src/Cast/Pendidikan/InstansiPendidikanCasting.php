<?php

namespace SotkClient\Cast\Pendidikan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Pendidikan\Sekolah as SekolahModel;

class InstansiPendidikanCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = SekolahModel::class;
}
