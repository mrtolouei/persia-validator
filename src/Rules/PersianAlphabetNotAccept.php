<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class PersianAlphabetNotAccept
 * @package Mrtolouei\PersiaValidator\Rules
 */
class PersianAlphabetNotAccept implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        return preg_match('/^[^\x{0600}-\x{06FF}]+$/u', $value);
    }
}