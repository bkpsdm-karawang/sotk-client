<?php

namespace SotkClient\Registrar;

use SotkClient\Modules\Pendidikan\Tingkat;
use SotkClient\Modules\Pendidikan\Satuan;
use SotkClient\Modules\Pendidikan\Jurusan;
use SotkClient\Modules\Pendidikan\Lembaga;
use SotkClient\Modules\Pendidikan\Sekolah;
use SotkClient\Modules\Pendidikan\PerguruanTinggi;

trait Pendidikan
{
    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createPendidikanTingkatDriver()
    {
        return new Tingkat($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createPendidikanSatuanDriver()
    {
        return new Satuan($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createPendidikanLembagaDriver()
    {
        return new Lembaga($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createPendidikanJurusanDriver()
    {
        return new Jurusan($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createPendidikanSekolahDriver()
    {
        return new Sekolah($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createPendidikanPerguruanTinggiDriver()
    {
        return new PerguruanTinggi($this->client);
    }
}
