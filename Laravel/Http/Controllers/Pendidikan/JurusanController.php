<?php

namespace SotkClient\Laravel\Http\Controllers\Pendidikan;

use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Laravel\Http\Controllers\Controller;

class JurusanController extends Controller
{
    /**
     * constructor
     *
     */
    public function __construct(SotkClient $manager)
    {
        $this->client = $manager::module('pendidikan-jurusan');
    }
}
