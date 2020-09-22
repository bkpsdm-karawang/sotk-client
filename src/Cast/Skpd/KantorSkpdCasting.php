<?php

namespace SotkClient\Cast\Skpd;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Skpd\KantorSkpd as KantorSkpdModel;

class KantorSkpdCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = KantorSkpdModel::class;
}
