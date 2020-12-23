<?php

namespace SotkClient\Laravel\Rules;

use SotkClient\Laravel\Facades\SotkClient;
use Illuminate\Contracts\Validation\Rule;

class IdDesaRule implements Rule
{
    /**
     * id kecamatan optional
     *
     * @var int
     */
    protected $idKecamatan;

    public function __construct($idKecamatan = null)
    {
        $this->idKecamatan = $idKecamatan;
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
            if ($this->idKecamatan) {
                $params['id_kecamatan'] = $this->idKecamatan;
            }

            SotkClient::module('lokasi-desa')->getDetail($value, $params);
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
        return 'The :attribute is not valid Id Desa';
    }
}
