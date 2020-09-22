<?php

namespace SotkClient\Modules;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use InvalidArgumentException;
use SotkClient\Response;

abstract class ModuleAbstract implements ModuleContract
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
     * response response
     *
     * @var \SotkClient\Response
     */
    protected $response;

    /**
     * query params
     *
     * @var array
     */
    protected $query = [];

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
        $this->response = new Response($this->model);
    }

    /**
     * with query string
     * @param string $relation
     * @return ModuleAbstract
     */
    public function with(string $relation)
    {
        if (isset($this->query['with'])) {
            $this->query['with'] .= ','.$relation;
        } else {
            $this->query['with'] = $relation;
        }

        return $this;
    }

    /**
     * search query string
     * @param string $keyword
     * @return ModuleAbstract
     */
    public function search(string $keyword)
    {
        $this->query['search'] = $keyword;

        return $this;
    }

    /**
     * get listing data.
     *
     * @param array $query
     * @param bool $transform
     * @return \Illuminate\Support\Collection
     * @throws Exception
     */
    public function getList(array $query = [], bool $transform = true)
    {
        $response = null;

        try {
            $response = $this->client->get($this->endpoint, ['query' => $this->buildQuery($query)]);
        } catch (ClientException $error) {
            $response = $error->getResponse();
        }

        if (! is_null($response)) {
            if ($response->getStatusCode() === 200) {
                if ($transform) {
                    return $this->response->generateListing($response);
                }
            } else if ($transform) {
                throw new Exception('Server SOTK not send status 200');
            }

            return $response;
        }

        throw new Exception('Request has no response');
    }

    /**
     * get detail data.
     *
     * @param mixed $identifier
     * @param array $query
     * @param bool $transform
     * @return \SotkClient\Models\Model
     */
    public function getDetail($identifier, array $query = [], bool $transform = true)
    {
        $response = null;

        try {
            $response = $this->client->get("{$this->endpoint}/{$identifier}", ['query' => $this->buildQuery($query)]);
        } catch (ClientException $error) {
            $response = $error->getResponse();
        }

        if (! is_null($response)) {
            if ($response->getStatusCode() === 200) {
                if ($transform) {
                    return $this->response->generateDetail($response);
                }
            } else if ($transform) {
                throw new Exception('Server SOTK not send status 200');
            }

            return $response;
        }

        throw new Exception('Request has no response');
    }

    /**
     * build query params.
     *
     * @param array $query
     * @return array
     */
    protected function buildQuery(array $query = []) : array
    {
        return array_merge_recursive($this->query, $query);
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
