<?php

namespace SotkClient\Cast;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Collection;
use SotkClient\Models\Model;

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
     * allowed field to set
     *
     * @var array
     */
    protected $fields = [];

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
     * get allowed fields
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
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

        $data = json_decode($value, true);

        if (! is_null($data) && is_array($data)) {
            return $this->createData($data);
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
        if (!isset($value) || empty($value) || is_null($value)) {
            return null;
        }

        if (!$this->isChildren && is_array($this->fields) && count($this->fields) > 0) {
            if ($value instanceof Model) {
                $data = $value->only($this->fields);
                return json_encode($data);
            }

            if (is_array($value)) {
                $data = array_intersect_key($value, array_flip($this->fields));
                return json_encode($data);
            }
        }

        return json_encode($value);
    }
}
