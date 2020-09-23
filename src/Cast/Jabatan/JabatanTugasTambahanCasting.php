<?php

namespace SotkClient\Cast\Jabatan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Jabatan\JabatanTugasTambahan as JabatanTugasTambahanModel;

class JabatanTugasTambahanCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = JabatanTugasTambahanModel::class;
}
