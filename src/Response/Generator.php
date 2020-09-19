<?php

namespace SotkClient\Response;

use GuzzleHttp\Psr7\Response as PsrResponse;

class Generator
{
    /**
     * model
     * TODO: dont use string
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
    public function __construct(string $model)
    {
        $this->model = $model;
    }

    /**
     * generate listing data
     *
     * @param \GuzzleHttp\Psr7\Response $response
     * @return
     */
    public function generateListing(PsrResponse $response)
    {
        $data = [];

        foreach ($response = $this->getContentFromResponse($response) as $object) {
            array_push($data, new $this->model($object));
        }

        return $data;
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
