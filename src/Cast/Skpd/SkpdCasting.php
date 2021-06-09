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

    /**
     * allowed field to set
     *
     * @var array
     */
    protected $fields = [
        'id', 'urutan', 'nama', 'singkatan',
        'logo', 'jenis', 'jenis_instansi'
    ];
}
