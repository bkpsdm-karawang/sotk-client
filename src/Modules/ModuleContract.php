<?php

namespace SotkClient\Modules;

/**
 * @property \GuzzleHttp\Client $client
 */
interface ModuleContract
{
    /**
     * with query string
     * @param string $relation
     * @return ModuleAbstract
     */
    public function with(string $relation) : ModuleContract;

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
}
