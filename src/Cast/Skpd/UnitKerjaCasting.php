<?php

namespace SotkClient\Cast\Skpd;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Skpd\UnitKerja as UnitKerjaModel;

class UnitKerjaCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = UnitKerjaModel::class;
}
