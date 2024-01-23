<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class PersianAlphabet
 * @package Mrtolouei\PersiaValidator\Rules
 */
class PersianAlphabet implements PersiaValidatorRule
{
    public function validate($attribute, $value, $parameters): bool
    {
        return preg_match('/^[\x{0600}-\x{06FF}\s\p{P}]+$/u', $value);
    }
}