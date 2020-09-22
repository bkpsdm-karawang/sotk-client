<?php

namespace SotkClient\Cast\Pendidikan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Pendidikan\Jenjang as JenjangModel;

class JenjangCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = JenjangModel::class;
}
