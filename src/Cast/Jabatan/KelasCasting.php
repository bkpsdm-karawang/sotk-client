<?php

namespace SotkClient\Cast\Jabatan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Jabatan\Kelas as KelasModel;

class KelasCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = KelasModel::class;
}
