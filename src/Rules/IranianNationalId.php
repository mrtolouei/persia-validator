<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class IranianNationalId
 * @package Mrtolouei\PersiaValidator\Rules
 */
class IranianNationalId implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        if(!preg_match('/^[0-9]{10}$/u', $value)) return false;
        $check = (int) $value[9];
        $sum = array_sum(array_map(function ($x) use ($value) {
                return ((int) $value[$x]) * (10 - $x);
            }, range(0, 8))) % 11;
        return $sum < 2 ? $check == $sum : $check + $sum == 11;
    }
}