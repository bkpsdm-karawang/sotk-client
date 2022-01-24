<?php

namespace SotkClient\Casts;

use Illuminate\Database\Eloquent\Model as IlMo;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Model implements CastsAttributes
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
            if (is_array($data)) {
                return new $this->model($data);
            }
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
            if ($value instanceof IlMo) {
                $value = $value->toArray();
            }

            if (is_array($value)) {
                return json_encode($value);
            }
        }

        return null;
    }
}
