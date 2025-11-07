<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCnpj implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
    {
        $cnpj = preg_replace('/\D/', '', $value);

        if (strlen($cnpj) != 14) return false;

        // Simple algorithm to validate CNPJ checksum
        $weights1 = [5,4,3,2,9,8,7,6,5,4,3,2];
        $weights2 = [6,5,4,3,2,9,8,7,6,5,4,3,2];

        for ($t = 12; $t < 14; $t++) {
            $sum = 0;
            for ($i = 0; $i < $t; $i++)
                $sum += $cnpj[$i] * ($t == 12 ? $weights1[$i] : $weights2[$i]);
            $digit = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);
            if ($cnpj[$t] != $digit) return false;
        }

        return true;
    }


    public function message()
    {
        return 'O CNPJ informado é inválido.';
    }
}
