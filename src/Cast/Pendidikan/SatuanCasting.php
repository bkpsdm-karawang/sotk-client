<?php

namespace SotkClient\Cast\Pendidikan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Pendidikan\Satuan as SatuanModel;

class SatuanCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = SatuanModel::class;
}
