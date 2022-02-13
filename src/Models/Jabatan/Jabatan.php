<?php

namespace SotkClient\Models\Jabatan;

use SotkClient\Casts\ReferensiJabatan;
use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Models\Skpd\Skpd;
use SotkClient\Models\Skpd\UnitKerja;
use SotkClient\Models\Base;
use SotkClient\Modules\ModuleContract;

class Jabatan Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skpd' => Skpd::class,
        'unit_kerja' => UnitKerja::class,
        'referensi' => ReferensiJabatan::class,
    ];

    /**
     * get latest data from sotk
     */
    public function getModule():ModuleContract
    {
        return SotkClient::module('jabatan');
    }

    /**
     * get latest data from sotk
     */
    public function fetchNew(array $query = [], bool $trsanform = true)
    {
        $query['status'] = 'all';

        return parent::fetchNew($query, $trsanform);
    }
}
