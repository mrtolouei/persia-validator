<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class CreditCard
 * @package Mrtolouei\PersiaValidator\Rules
 */
class CreditCard implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        $value = str_replace("-","",$value);
        $value = str_replace(" ","",$value);
        if(!preg_match('/^[0-9]{16}$/u', $value)) return false;
        $value = str_split($value);
        $total = 0;
        for($i = 0; $i < 16; $i++) {
            $number = (int) $value[$i];
            if($i % 2 == 0) $total += (($number * 2 > 9) ? ($number * 2) - 9 : ($number * 2));
            else $total += $number;
        }
        return $total % 10 === 0;
    }
}