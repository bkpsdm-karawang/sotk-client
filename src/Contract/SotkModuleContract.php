<?php

namespace SotkClient\Contract;

interface SotkModuleContract
{
    /**
     * get listing data.
     *
     * @param array $query
     * @return ReponseContract
     */
    public function getList(array $query = []);

    /**
     * proxy to client.
     *
     * @param array $arguments
     * @return ReponseContract
     */
    public function __call($name, array $arguments);
}
