<?php

namespace SotkClient\Registrar;

use SotkClient\Modules\Jabatan\Eselon;
use SotkClient\Modules\Jabatan\Golongan;
use SotkClient\Modules\Jabatan\Jabatan as JabatanModule;
use SotkClient\Modules\Jabatan\JabatanFungsional;
use SotkClient\Modules\Jabatan\JabatanPelaksana;
use SotkClient\Modules\Jabatan\JabatanPolitik;
use SotkClient\Modules\Jabatan\JabatanStruktural;
use SotkClient\Modules\Jabatan\JabatanTugasTambahan;

trait Jabatan
{
    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createJabatanDriver()
    {
        return new JabatanModule($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createJabatanEselonDriver()
    {
        return new Eselon($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createJabatanGolonganDriver()
    {
        return new Golongan($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createJabatanFungsionalDriver()
    {
        return new JabatanFungsional($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createJabatanPelaksanaDriver()
    {
        return new JabatanPelaksana($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createJabatanPolitikDriver()
    {
        return new JabatanPolitik($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createJabatanStrukturalDriver()
    {
        return new JabatanStruktural($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createJabatanTugasTambahanDriver()
    {
        return new JabatanTugasTambahan($this->client);
    }
}
