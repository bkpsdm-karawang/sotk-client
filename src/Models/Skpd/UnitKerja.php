<?php

namespace SotkClient\Models\Skpd;

use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Models\Base;
use SotkClient\Models\Jabatan\Jabatan;
use SotkClient\Modules\ModuleContract;

class UnitKerja Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skpd' => Skpd::class,
        'ancestors' => UnitKerja::class.':collection',
        'descendants' => UnitKerja::class.':collection',
        'parent' => UnitKerja::class,
        'children' => UnitKerja::class.':collection',
        'jabatan_kepala' => Jabatan::class,
    ];

    /**
     * get latest data from sotk
     */
    public function getModule():ModuleContract
    {
        return SotkClient::module('skpd_unit_kerja');
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
