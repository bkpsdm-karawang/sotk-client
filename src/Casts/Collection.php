<?php

namespace SotkClient\Casts;

use Illuminate\Support\Collection as Illuminate;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Collection implements CastsAttributes
{
    /**
     * Model.
     *
     * @var string
     */
    protected $model;

    /**
     * Create a new cast class instance.
     *
     * @param  string|null  $model
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Transform the attribute from the underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if (isset($attributes[$key])) {
            $data = json_decode($attributes[$key], true);

            return new Illuminate(array_map(function($item) {
                return new $this->model($item);
            }, $data));
        }

        return null;
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if ($value) {
            if ($value instanceof Illuminate) {
                $value = $value->toArray();
            }

           return json_encode($value);
        }

        return null;
    }
}
