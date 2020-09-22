<?php

namespace SotkClient;

use GuzzleHttp\Psr7\Response as PsrResponse;
use SotkClient\Models\Model;
use Illuminate\Support\Collection;

class Response
{
    /**
     * model
     *
     * @var string
     */
    protected $model;

    /**
     * is response use wrapper
     *
     * @var bool
     */
    protected $isWrapped = true;

    /**
     * response wrapper
     *
     * @var bool
     */
    protected $wrapper = "data";

    /**
     * constructor
     *
     * @param string $model
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * generate listing data
     *
     * @param \GuzzleHttp\Psr7\Response $response
     * @return \Illuminate\Support\Collection
     */
    public function generateListing(PsrResponse $response) : Collection
    {
        $data = [];

        foreach ($this->getContentFromResponse($response) as $object) {
            $this->setCasting($object);
            array_push($data, new $this->model($object));
        }

        return new Collection($data);
    }

    /**
     * generate listing data
     *
     * @param \GuzzleHttp\Psr7\Response $response
     * @return \SotkClient\Models\Model
     */
    public function generateDetail(PsrResponse $response)
    {
        $data = $this->getContentFromResponse($response);

        $this->setCasting($data);

        return new $this->model($data);
    }

    /**
     * get content of response
     *
     * @param \p\Psr7\Response $response
     * @return array
     */
    protected function getContentFromResponse(PsrResponse $response) : array
    {
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        if ($this->isWrapped && array_key_exists($this->wrapper, $data)) {
            return $data[$this->wrapper];
        }

        return $data;
    }

    protected function setCasting(array &$data)
    {
        $casts = (new $this->model)->getCasts();

        foreach ($casts as $key => $cast) {
            $exploded = explode(':', $cast);
            $class = $exploded[0];

            if (class_exists($class) && array_key_exists($key, $data)) {
                $model = $class::getModel();

                if (!isset($exploded[1])) {
                    $data[$key] = new $model($data[$key]);
                } else if ($exploded[1] === 'children') {
                    $data[$key] = new Collection(array_map(function($obj) use ($model) {
                        return new $model($obj);
                    }, $data[$key]));
                }
            }
        }
    }
}
