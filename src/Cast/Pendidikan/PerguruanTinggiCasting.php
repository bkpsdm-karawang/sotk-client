<?php

namespace SotkClient\Cast\Pendidikan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Pendidikan\PerguruanTinggi as PerguruanTinggiModel;

class PerguruanTinggiCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = PerguruanTinggiModel::class;
}
