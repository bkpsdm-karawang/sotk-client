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

    /**
     * allowed field to set
     *
     * @var array
     */
    protected $fields = [
        'id', 'urutan', 'nama', 'nama_lengkap', 'singkatan',
        'jenis', 'id_skpd', 'id_parent'
    ];
}
