<?php

namespace SotkClient;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Manager;
use InvalidArgumentException;
use SotkClient\Modules\Bupati;
use SotkClient\Modules\Lokasi\Desa;
use SotkClient\Modules\Lokasi\Kabupaten;
use SotkClient\Modules\Lokasi\Kecamatan;
use SotkClient\Modules\Lokasi\Provinsi;

class ClientManager extends Manager
{
    /**
     * guzzle client interface
     *
     * @var ClientInterface
     */
    protected $client;

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
     * ceate module
     *
     * @param string $name
     * @return \SotkClient\Modules\ModuleContract
     */
    public function module(string $name)
    {
        return $this->driver($name);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createBupatiDriver()
    {
        return new Bupati($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createLokasiProvinsiDriver()
    {
        return new Provinsi($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createLokasiDesaDriver()
    {
        return new Desa($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createLokasiKecamatanDriver()
    {
        return new Kecamatan($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createLokasiKabupatenDriver()
    {
        return new Kabupaten($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createProvinsipDriver()
    {
        return new Bupati($this->client);
    }

    /**
     * Get the default driver name.
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getDefaultDriver()
    {
        throw new InvalidArgumentException('No sotk client driver was specified.');
    }
}
