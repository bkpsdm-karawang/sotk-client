<?php

namespace SotkClient\Cast\Pendidikan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Pendidikan\Jurusan as JurusanModel;

class JurusanCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = JurusanModel::class;
}
