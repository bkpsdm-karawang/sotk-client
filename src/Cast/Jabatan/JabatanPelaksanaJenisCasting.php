<?php

namespace SotkClient\Cast\Jabatan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Jabatan\JabatanPelaksanaJenis as JabatanPelaksanaJenisModel;

class JabatanPelaksanaJenisCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = JabatanPelaksanaJenisModel::class;
}
