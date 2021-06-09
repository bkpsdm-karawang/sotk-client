<?php

namespace SotkClient\Cast\Jabatan;

use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Jabatan\Jabatan as JabatanModel;

class JabatanCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = JabatanModel::class;

    /**
     * allowed field to set
     *
     * @var array
     */
    protected $fields = [
        'id', 'nama', 'jenis', 'urutan', 'formasi', 'id_skpd', 'jenjang',
        'singkatan', 'spesifikasi', 'id_referensi', 'spesialisasi', 'referensi',
        'nama_lengkap', 'id_unit_kerja', 'id_jabatan_atasan', 'is_jabatan_kepala',
        'id_jabatan_fungsional_spesialisasi'
    ];
}
