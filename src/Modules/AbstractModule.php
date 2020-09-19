<?php

namespace SotkClient\Modules;

use Exception;
use GuzzleHttp\ClientInterface;
use InvalidArgumentException;
use SotkClient\Contract\SotkModuleContract;
use SotkClient\Response\Generator;

abstract class AbstractModule implements SotkModuleContract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint;

    /**
     * model of module
     *
     * @var \SotkClient\Models\Model
     */
    protected $model;

    /**
     * response generator
     *
     * @var \SotkClient\Response\Generator
     */
    protected $generator;

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
        $this->generator = new Generator($this->model);
    }

    /**
     * get listing data.
     *
     * @param array $query
     * @return ReponseContract
     */
    public function getList(array $query = [])
    {
        try {
            $response = $this->client->get($this->endpoint, ['query' => $query]);

            if ($response->getStatusCode() === 200) {
                return $this->generator->generateListing($response);
            }

            throw new Exception('Server not response with status code 200');
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
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
