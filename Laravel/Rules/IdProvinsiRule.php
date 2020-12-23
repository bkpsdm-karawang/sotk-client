<?php

namespace SotkClient\Laravel\Rules;

use SotkClient\Laravel\Facades\SotkClient;
use Illuminate\Contracts\Validation\Rule;

class IdProvinsiRule implements Rule
{
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
            SotkClient::module('lokasi-provinsi')->getDetail($value);
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
        return 'The :attribute is not valid Id Provinsi';
    }
}
