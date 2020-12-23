<?php

namespace SotkClient\Cast;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Collection;

abstract class BaseCasting implements CastsAttributes
{
    /**
     * cast to model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * is children
     *
     * @var bool
     */
    protected $isChildren = false;

    /**
     * Create a new cast class instance.
     *
     * @param  string|null  $param
     * @return void
     */
    public function __construct(...$params)
    {
        $this->isChildren = in_array('children', $params);
    }

    /**
     * get cast to model
     *
     * @return \Illuminate\Database\Eloquent\Model;
     */
    public static function getModel()
    {
        return (new static)->model;
    }

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \App\Models\Address
     */
    public function get($model, $key, $value, $attributes)
    {
        if (!isset($value)) {
            return null;
        }

        if ($this->isChildren) {
            return new Collection(array_map(function($data) {
                return $this->createData($data);
            }, $value ? json_decode($value, true) : []));
        }

        if (! is_null($value)) {
            return $this->createData(json_decode($value, true));
        }

        return null;
    }

    /**
     * create data
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function createData(array $data)
    {
        return new $this->model($data);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function set($model, $key, $value, $attributes)
    {
        if (isset($value)) {
            return json_encode($value);
        }

        return null;
    }
}
