<?php

namespace SotkClient\Cast\Lokasi;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Lokasi\Desa as DesaModel;

class DesaCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = DesaModel::class;
}
