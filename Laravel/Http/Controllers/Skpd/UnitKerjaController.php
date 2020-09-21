<?php

namespace SotkClient\Laravel\Http\Controllers\Skpd;

use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Laravel\Http\Controllers\Controller;

class UnitKerjaController extends Controller
{
    /**
     * constructor
     *
     */
    public function __construct(SotkClient $manager)
    {
        $this->client = $manager::module('skpd-unit-kerja');
    }
}
