<?php

namespace SotkClient\Cast;

use InvalidArgumentException;
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
        if ($this->isChildren) {
            return new Collection(array_map(function($data) {
                return new $this->model($data);
            }, $value ? json_decode($value, true) : []));
        }

        if (! is_null($value)) {
            return new $this->model(json_decode($value, true));
        }

        return null;
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
        if ($this->isChildren) {
            if (! $value instanceof Collection) {
                throw new InvalidArgumentException('The given value is not an instance of ' . Collection::class . '.');
            }

            foreach ($value as $item) {
                if (! $item instanceof $this->model) {
                    throw new InvalidArgumentException("All items must be instance of {$this->model}.");
                }
            }

            return json_encode($value->toArray());
        }

        if (! $value instanceof $this->model) {
            throw new InvalidArgumentException("The given value is not an instance of {$this->model}.");
        }

        return json_encode($value->toArray());
    }
}
