<?php

namespace SotkClient\Cast\Lokasi;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Lokasi\Kabupaten as KabupatenModel;

class KabupatenCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = KabupatenModel::class;
}
