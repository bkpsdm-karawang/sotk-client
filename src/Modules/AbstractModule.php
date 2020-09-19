<?php

namespace SotkClient\Modules;

use GuzzleHttp\ClientInterface;
use InvalidArgumentException;
use SotkClient\Contract\SotkModuleContract;

abstract class AbstractModule implements SotkModuleContract
{
    /**
     * base endpoint of module
     * 
     * @var string
     */
    protected $endpoint;

    /**
     * constructor
     * 
     * @param ClientInterface $client
     * 
     * @return void
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * get listing data.
     *
     * @param array $query
     * @return ReponseContract
     */
    public function getList(array $query = [])
    {
        return $this->client->get($this->endpoint, ['query' => $query]);
    }

    /**
     * proxy to client.
     *
     * @param array $arguments
     * @return ReponseContract
     */
    public function __call($name, array $arguments)
    {
        if (method_exists($this->client, $name)) {
            return call_user_func_array([$this->client, $name], $arguments);
        }

        throw new InvalidArgumentException("{$name} is not defined method");
    }
}