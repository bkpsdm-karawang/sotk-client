<?php

namespace SotkClient\Modules\Jabatan;

use BadMethodCallException;
use SotkClient\Modules\ModuleAbstract;

class Eselon extends ModuleAbstract
{
    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/eselon';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Jabatan\Eselon::class;

    /**
     * get detail data.
     *
     * @param mixed $identifier
     * @param array $query
     * @param bool $transform
     * @return \SotkClient\Models\Model
     */
    public function getDetail($identifier, array $query = [], bool $transform = true)
    {
        throw new BadMethodCallException('Not implemented');
    }
}
