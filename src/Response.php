<?php

namespace SotkClient;

use Illuminate\Support\Collection;
use GuzzleHttp\Psr7\Response as PsrResponse;
use SotkClient\Models\Model;

class Response
{
    /**
     * model
     *
     * @var Model
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
     * @param Model $model
     * @return void
     */
    public function __construct(Model $model)
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

        foreach ($response = $this->getContentFromResponse($response) as $object) {
            array_push($data, $this->model->replicate()->fill($object));
        }

        return new Collection($data);
    }

    /**
     * generate listing data
     *
     * @param \GuzzleHttp\Psr7\Response $response
     * @return \SotkClient\Models\Model
     */
    public function generateDetail(PsrResponse $response) : Model
    {
        $data = $this->getContentFromResponse($response);

        $this->model->fill($data);

        return $this->model;
    }

    /**
     * get content of response
     *
     * @param \GuzzleHttp\Psr7\Response $response
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
}
