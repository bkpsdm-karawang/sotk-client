<?php

namespace SotkClient\Modules;

use Exception;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;

trait WriteTrait
{
    /**
     * create resource
     */
    public function create(array $data, bool $transform = true)
    {
        $response = null;

        try {
            $response = $this->client->post("{$this->endpoint}", ['json' => $data]);
        } catch (ClientException $error) {
            $response = $error->getResponse();
        }

        if (! is_null($response)) {
            if (in_array($response->getStatusCode(), [200, 201])) {
                if ($transform) {
                    return $this->response->generateDetail($response);
                }
            } else if ($transform) {
                $body = $response->getBody();
                $content = $body->getContents();
                $data = json_decode($content, true);
                $message = $data['message'] ?? '';
                if ($response->getStatusCode() === 422) {
                    throw ValidationException::withMessages($data['data'] ?? []);
                }
                throw new HttpException($response->getStatusCode(), 'Error SOTK : '.$message);
            }

            return $response;
        }

        throw new Exception('Request has no response');
    }

    /**
     * update resource.
     */
    public function update($identifier, array $data, bool $transform = true)
    {
        $response = null;

        try {
            $response = $this->client->put("{$this->endpoint}/{$identifier}", ['json' => $data]);
        } catch (ClientException $error) {
            $response = $error->getResponse();
        }

        if (! is_null($response)) {
            if ($response->getStatusCode() === 200) {
                if ($transform) {
                    return $this->response->generateDetail($response);
                }
            } else if ($transform) {
                $body = $response->getBody();
                $content = $body->getContents();
                $data = json_decode($content, true);
                $message = $data['message'] ?? '';
                if ($response->getStatusCode() === 422) {
                    throw ValidationException::withMessages($data['data'] ?? []);
                }
                throw new HttpException($response->getStatusCode(), 'Error SOTK : '.$message);
            }

            return $response;
        }

        throw new Exception('Request has no response');
    }

    /**
     * delete resource.
     */
    public function delete($identifier, bool $transform = true)
    {
        $response = null;

        try {
            $response = $this->client->delete("{$this->endpoint}/{$identifier}");
        } catch (ClientException $error) {
            $response = $error->getResponse();
        }

        if (! is_null($response)) {
            if ($response->getStatusCode() === 200) {
                if ($transform) {
                    return $this->response->generateDetail($response);
                }
            } else if ($transform) {
                $body = $response->getBody();
                $content = $body->getContents();
                $data = json_decode($content, true);
                $message = $data['message'] ?? '';
                throw new HttpException($response->getStatusCode(), 'Error SOTK : '.$message);
            }

            return $response;
        }

        throw new Exception('Request has no response');
    }
}
