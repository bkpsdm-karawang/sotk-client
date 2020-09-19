<?php

namespace SotkClient\Modules;

use Illuminate\Support\Collection;
use SotkClient\Models\Model;

interface ModuleContract
{
    /**
     * get listing data.
     *
     * @param array $query
     * @return \Illuminate\Support\Collection
     */
    public function getList(array $query = []) : Collection;

    /**
     * get detail data.
     *
     * @param mixed $identifier
     * @return \SotkClient\Models\Model
     */
    public function getDetail($identifier) : Model;

    /**
     * proxy to client.
     *
     * @param array $arguments
     * @return ReponseContract
     */
    public function __call($name, array $arguments);
}
