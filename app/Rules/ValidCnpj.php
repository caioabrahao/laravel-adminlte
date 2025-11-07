<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCnpj implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        if (is_null($value)) return false;

        $cnpj = preg_replace('/\D/', '', $value);

        if (strlen($cnpj) != 14) return false;

        // Simple algorithm to validate CNPJ checksum
        $weights1 = [5,4,3,2,9,8,7,6,5,4,3,2];
        $weights2 = [6,5,4,3,2,9,8,7,6,5,4,3,2];

        for ($t = 12; $t < 14; $t++) {
            $sum = 0;
            for ($i = 0; $i < $t; $i++) {
                $sum += (int) $cnpj[$i] * ($t == 12 ? $weights1[$i] : $weights2[$i]);
            }
            $digit = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);
            if ((int) $cnpj[$t] !== $digit) return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'O CNPJ informado é inválido.';
    }
}
