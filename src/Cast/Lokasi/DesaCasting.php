<?php

namespace SotkClient\Cast\Lokasi;

use Illuminate\Support\Collection;
use SotkClient\Cast\BaseCasting;
use SotkClient\Models\Lokasi\Desa as DesaModel;

class DesaCasting extends BaseCasting
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
                return new DesaModel($data);
            }, $value));
        }
        return new DesaModel($value);
    }
}
