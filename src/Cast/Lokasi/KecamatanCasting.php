<?php

namespace SotkClient\Cast\Lokasi;

use SotkClient\Models\Lokasi\Kecamatan as KecamatanModel;
use SotkClient\Cast\BaseCasting;
use Illuminate\Support\Collection;

class KecamatanCasting implements BaseCasting
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
                return new KecamatanModel($data);
            }, $value ?: []));
        }

        if (! is_null($value)) {
            return new KecamatanModel($value);
        }

        return null;

    }
}
