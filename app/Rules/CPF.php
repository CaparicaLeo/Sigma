<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CPF implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(strlen($value)!= 11){
            $fail("CPF INVALIDO!!!");
            dd($value);
        }
        $soma = 0;
        for($i = 0; $i< strlen($value); $i++){
            $soma += intval($value[$i]) * (10 - $i);
        }
        $digito1 = 11 - ($soma % 11);
        if ($digito1 >= 10)
            $digito1 = 0;
        if ($digito1 != intval($value[9])){
            $fail("CPF INVALIDO!!!");
            dd($value);
        }
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += intval($value[$i]) * (11 - $i);
        }
        $digito2 = 11 - ($soma % 11);
        if ($digito2 >= 10)
            $digito2 = 0;
        if ($digito2 != intval($value[10])){
            $fail("CPF INVALIDO!!!");
            dd($value);
        }

    }
}
