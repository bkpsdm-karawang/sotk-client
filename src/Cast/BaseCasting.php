<?php

namespace SotkClient\Cast;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

abstract class BaseCasting implements CastsAttributes
{
    /**
     * is children
     *
     * @var bool
     */
    protected $isChildren =  false;

    /**
     * Create a new cast class instance.
     *
     * @param  string|null  $param
     * @return void
     */
    public function __construct($param = null)
    {
        $this->isChildren = $param === 'children';
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  \App\Models\Address  $value
     * @param  array  $attributes
     * @return array
     */
    public function set($model, $key, $value, $attributes)
    {
        return [$key => $value];
    }
}
