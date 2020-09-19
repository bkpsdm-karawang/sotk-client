<?php

namespace SotkClient\Models;

use BadMethodCallException;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Contracts\Database\Eloquent\Castable;

abstract class Model extends BaseModel implements Castable
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array|bool
     */
    protected $guarded = [];

    /**
     * Save the model to the database.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = [])
    {
        throw new BadMethodCallException('Not implemented');
    }
}
