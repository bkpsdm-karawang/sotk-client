<?php

namespace SotkClient\Laravel\Http\Controllers\Jabatan;

use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Laravel\Http\Controllers\Controller;

class JabatanStrukturalController extends Controller
{
    /**
     * constructor
     *
     */
    public function __construct(SotkClient $manager)
    {
        $this->client = $manager::module('jabatan-struktural');
    }
}
