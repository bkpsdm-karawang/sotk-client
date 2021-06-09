<?php

namespace SotkClient\Cast\Jabatan;

use InvalidArgumentException;
use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Model;
use SotkClient\Models\Jabatan\JabatanFungsional;
use SotkClient\Models\Jabatan\JabatanPelaksana;
use SotkClient\Models\Jabatan\JabatanPolitik;
use SotkClient\Models\Jabatan\JabatanStruktural;
use SotkClient\Models\Jabatan\JabatanTugasTambahan;
use SotkClient\Models\Jabatan\ReferensiJabatanContract;

class ReferensiJabatanCasting extends BaseCasting
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = ReferensiJabatanContract::class;

    /**
     * create data
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function createData(array $data)
    {
        switch ($data['jenis']) {
            case 'struktural':
                return new JabatanStruktural($data);
            break;
            case 'fungsional':
                return new JabatanFungsional($data);
            break;
            case 'pelaksana':
                return new JabatanPelaksana($data);
            break;
            case 'politik':
                return new JabatanPolitik($data);
            break;
            case 'tugas_tambahan':
                return new JabatanTugasTambahan($data);
            break;
        }

        throw new InvalidArgumentException("{$data['jenis']} not valid jenis jabaan");
    }
}
