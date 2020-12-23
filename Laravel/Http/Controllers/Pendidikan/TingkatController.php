<?php

namespace SotkClient\Laravel\Http\Controllers\Pendidikan;

use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Laravel\Http\Controllers\Controller;

class TingkatController extends Controller
{
    /**
     * constructor
     *
     */
    public function __construct(SotkClient $manager)
    {
        $this->client = $manager::module('pendidikan-tingkat');
    }
}
