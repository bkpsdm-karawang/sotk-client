<?php

namespace SotkClient\Cast\Skpd;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Skpd\Skpd as SkpdModel;

class SkpdCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = SkpdModel::class;
}
