<?php

namespace SotkClient\Laravel\Rules;

use SotkClient\Laravel\Facades\SotkClient;
use Illuminate\Contracts\Validation\Rule;

class IdKabupatenRule implements Rule
{
    /**
     * id provinsi optional
     *
     * @var int
     */
    protected $idProvinsi;

    public function __construct($idProvinsi = null)
    {
        $this->idProvinsi = $idProvinsi;
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
            if ($this->idProvinsi) {
                $params['id_provinsi'] = $this->idProvinsi;
            }

            SotkClient::module('lokasi-kabupaten')->getDetail($value, $params);
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
        return 'The :attribute is not valid Id Kabupaten';
    }
}
