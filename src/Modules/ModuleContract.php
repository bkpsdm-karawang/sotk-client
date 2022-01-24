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
    public function setEndpoint(string $endpoint) : ModuleContract;

    /**
     * with query string
     * @param string|array $relation
     * @return ModuleContract
     */
    public function with($relation = null) : ModuleContract;

    /**
     * get listing data.
     *
     * @param array $query
     * @return mixed
     */
    public function getList(array $query = [], bool $transform = true);

    /**
     * get detail data.
     *
     * @param mixed $identifier
     * @return mixed
     */
    public function getDetail($identifier, array $query = [], bool $transform = true);
}
