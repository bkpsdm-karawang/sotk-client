<?php

namespace SotkClient\Models;

use SotkClient\Modules\ModuleContract;

interface Refreshable
{
    /**
     * get latest data from sotk
     */
    public function getModule():ModuleContract;

    /**
     * get latest data from sotk
     */
    public function fetchNew(array $query = []);
}
