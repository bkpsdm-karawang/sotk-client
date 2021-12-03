<?php

namespace SotkClient\Cast\Jabatan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Jabatan\KompetensiGroup as KompetensiGroupModel;

class KompetensiGroupCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = KompetensiGroupModel::class;
}
