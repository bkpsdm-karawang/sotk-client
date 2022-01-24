<?php

namespace SotkClient\Modules;

interface ModuleWriteContract extends ModuleContract
{
    /**
     * create resource
     *
     * @param string $relation
     * @return ModuleAbstract
     */
    public function create(array $data, bool $transform = true);

    /**
     * update resource.
     *
     * @param mixed $identifier
     * @return \SotkClient\Models\Base
     */
    public function update($identifier, array $data, bool $transform = true);

    /**
     * delete resource.
     *
     * @param mixed $identifier
     * @return \SotkClient\Models\Base
     */
    public function delete($identifier, bool $transform = true);
}
