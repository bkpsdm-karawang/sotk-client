<?php

namespace SotkClient\Models\Skpd;

use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Models\Base;
use SotkClient\Models\Jabatan\Jabatan;
use SotkClient\Modules\ModuleContract;

class Skpd Extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'jabatan_kepala' => Jabatan::class,
    ];

    /**
     * get latest data from sotk
     */
    public function getModule():ModuleContract
    {
        return SotkClient::module('skpd');
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
