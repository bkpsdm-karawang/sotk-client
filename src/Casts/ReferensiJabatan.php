<?php

namespace SotkClient\Casts;

use InvalidArgumentException;
use SotkClient\Models\Jabatan\JabatanFungsional;
use SotkClient\Models\Jabatan\JabatanPelaksana;
use SotkClient\Models\Jabatan\JabatanPolitik;
use SotkClient\Models\Jabatan\JabatanStruktural;
use SotkClient\Models\Jabatan\JabatanTugasTambahan;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class ReferensiJabatan implements CastsAttributes
{
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

            switch ($data['jenis']) {
                case 'struktural':
                    return new JabatanStruktural($data);
                break;
                case 'fungsional':
                    return new JabatanFungsional($data);
                break;
                case 'pelaksana':
                    return new JabatanPelaksana($data);
                break;
                case 'politik':
                    return new JabatanPolitik($data);
                break;
                case 'tugas_tambahan':
                    return new JabatanTugasTambahan($data);
                break;
            }

            throw new InvalidArgumentException("{$data['jenis']} not valid jenis jabaan");
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
            if ($value instanceof Model) {
                $value = $value->toArray();
            }

           return json_encode($value);
        }

        return null;
    }
}
