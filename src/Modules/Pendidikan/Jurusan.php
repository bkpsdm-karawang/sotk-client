<?php

namespace SotkClient\Modules\Pendidikan;

use SotkClient\Modules\ModuleAbstract;
use SotkClient\Modules\ModuleWriteContract;
use SotkClient\Modules\WriteTrait;

class Jurusan extends ModuleAbstract implements ModuleWriteContract
{
    use WriteTrait;

    /**
     * base endpoint of module
     *
     * @var string
     */
    protected $endpoint = '/pendidikan/jurusan';

    /**
     * model of module
     *
     * @var \SotkClient\Models\Base
     */
    protected $model = \SotkClient\Models\Pendidikan\Jurusan::class;
}
