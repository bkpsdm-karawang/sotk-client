<?php

namespace SotkClient\Laravel\Http\Controllers\Jabatan;

use GuzzleHttp\Psr7\Response;
use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Laravel\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class JabatanController extends Controller
{
    /**
     * constructor
     *
     */
    public function __construct(SotkClient $manager)
    {
        $this->client = $manager::module('jabatan');
    }

    /**
     * get kualifikasi.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return JsonResponse
     */
    public function getKualifikasi($id)
    {
        $client = $this->client->getClient();
        $response = $client->get("jabatan/{$id}/kualifikasi");

        return $this->getDataFromResponse($response);
    }

    /**
     * get kompetensi.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return JsonResponse
     */
    public function getKompetensi($id)
    {
        $client = $this->client->getClient();
        $response = $client->get("jabatan/{$id}/kompetensi");

        return $this->getDataFromResponse($response);
    }

    /**
     * getJabatanAtasan
     */
    public function getJabatanAtasan($id)
    {
        $client = $this->client->getClient();
        $response = $client->get("jabatan/{$id}/jabatan_atasan");

        return $this->getDataFromResponse($response);
    }

    /**
     * getJabatanBawahan
     */
    public function getJabatanBawahan($id)
    {
        $client = $this->client->getClient();
        $response = $client->get("jabatan/{$id}/jabatan_bawahan");

        return $this->getDataFromResponse($response);
    }

    /**
     * getJabatanBawahanGroup
     */
    public function getJabatanBawahanGroup($id)
    {
        $client = $this->client->getClient();
        $response = $client->get("jabatan/{$id}/jabatan_bawahan_group");

        return $this->getDataFromResponse($response);
    }

    /**
     * getAncestors
     */
    public function getAncestors($id)
    {
        $client = $this->client->getClient();
        $response = $client->get("jabatan/{$id}/ancestors");

        return $this->getDataFromResponse($response);
    }

    /**
     * getDescendants
     */
    public function getDescendants($id)
    {
        $client = $this->client->getClient();
        $response = $client->get("jabatan/{$id}/descendants");

        return $this->getDataFromResponse($response);
    }


    /**
     * get data from psr response.
     */
    protected function getDataFromResponse(Response $response): array
    {
        $body = $response->getBody();
        $status = $response->getStatusCode();
        $content = $body->getContents();
        $decoded = json_decode($content, true);

        if (200 === $status) {
            return $decoded;
        }

        throw new BadRequestHttpException($decoded['message'] ?? 'Error get jabatan');
    }
}
