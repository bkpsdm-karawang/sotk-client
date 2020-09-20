<?php

namespace SotkClient\Registrar;

use SotkClient\Modules\Pendidikan\Jenjang;
use SotkClient\Modules\Pendidikan\Jurusan;
use SotkClient\Modules\Pendidikan\PerguruanTinggi;

trait Pendidikan
{
    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createPendidikanJenjangDriver()
    {
        return new Jenjang($this->client);
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
    protected function createPendidikanPerguruanTinggiDriver()
    {
        return new PerguruanTinggi($this->client);
    }
}
