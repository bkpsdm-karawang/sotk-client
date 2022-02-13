<?php

namespace SotkClient\Models;

use Error;
use SotkClient\Casts\Model as ModelCasting;
use SotkClient\Casts\Collection as CollectionCasting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Castable;
use SotkClient\Laravel\Facades\SotkClient;
use SotkClient\Modules\ModuleContract;

abstract class Base extends Model implements Castable, Refreshable
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * Get the caster class to use when casting from / to this cast target.
     *
     * @param  array  $arguments
     * @return object|string
     */
    public static function castUsing(array $arguments)
    {
        if (count($arguments) && $arguments[0] === 'collection') {
            return new CollectionCasting(static::class);
        }

        return new ModelCasting(static::class);
    }

    /**
     * get latest data from sotk
     */
    public function getModule():ModuleContract
    {
        throw new Error('Not implemented');
    }

    /**
     * get latest data from sotk
     */
    public function fetchNew(array $query = [], bool $trsanform = true)
    {
        $module = $this->getModule();

        return $module->getDetail($this->id, $query, $trsanform);
    }
}
