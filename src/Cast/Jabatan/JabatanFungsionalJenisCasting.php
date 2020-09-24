<?php

namespace SotkClient\Cast\Jabatan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Jabatan\JabatanFungsionalJenis as JabatanFungsionalJenisModel;

class JabatanFungsionalJenisCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = JabatanFungsionalJenisModel::class;
}
