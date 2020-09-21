<?php

namespace SotkClient\Registrar;

use SotkClient\Modules\Skpd\Skpd as ModuleSkpd;
use SotkClient\Modules\Skpd\UnitKerja;
use SotkClient\Modules\Skpd\KantorSkpd;

trait Skpd
{
    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createSkpdDriver()
    {
        return new ModuleSkpd($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createSkpdUnitKerjaDriver()
    {
        return new UnitKerja($this->client);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \SotkClient\Modules\AbstractModule
     */
    protected function createSkpdKantorSkpdDriver()
    {
        return new KantorSkpd($this->client);
    }
}
