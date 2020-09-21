<?php

namespace SotkClient\Cast\Skpd;

use Illuminate\Support\Collection;
use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Skpd\UnitKerja as UnitKerjaModel;

class UnitKerjaCasting extends BaseCasting
{
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
                return new UnitKerjaModel($data);
            }, $value ?: []));
        }

        if (! is_null($value)) {
            return new UnitKerjaModel($value);
        }

        return null;
    }
}
