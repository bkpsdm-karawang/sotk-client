<?php

namespace SotkClient\Modules;

interface ModuleContract
{
    /**
     * get listing data.
     *
     * @param array $query
     * @return \Illuminate\Support\Collection
     */
    public function getList(array $query = [], bool $transform = true);

    /**
     * get detail data.
     *
     * @param mixed $identifier
     * @return \SotkClient\Models\Model
     */
    public function getDetail($identifier, array $query = [], bool $transform = true);

    /**
     * proxy to client.
     *
     * @param array $arguments
     * @return ReponseContract
     */
    public function __call($name, array $arguments);
}
