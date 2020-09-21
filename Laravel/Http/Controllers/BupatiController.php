<?php

namespace SotkClient\Laravel\Http\Controllers;

use SotkClient\Laravel\Facades\SotkClient;

class BupatiController extends Controller
{
    /**
     * constructor
     *
     */
    public function __construct(SotkClient $manager)
    {
        $this->client = $manager::module('bupati');
    }
}
