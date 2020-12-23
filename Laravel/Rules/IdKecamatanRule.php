<?php

namespace SotkClient\Laravel\Rules;

use SotkClient\Laravel\Facades\SotkClient;
use Illuminate\Contracts\Validation\Rule;

class IdKecamatanRule implements Rule
{
    /**
     * id kabupaten optional
     *
     * @var int
     */
    protected $idKabupaten;

    public function __construct($idKabupaten = null)
    {
        $this->idKabupaten = $idKabupaten;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $params = [];
            if ($this->idKabupaten) {
                $params['id_kabupaten'] = $this->idKabupaten;
            }

            SotkClient::module('lokasi-kecamatan')->getDetail($value, $params);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not valid Id Kecamatan';
    }
}
