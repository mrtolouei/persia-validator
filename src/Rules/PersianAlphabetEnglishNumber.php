<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class PersianAlphabetEnglishNumber
 * @package Mrtolouei\PersiaValidator\Rules
 */
class PersianAlphabetEnglishNumber implements PersiaValidatorRule
{
    public function validate($attribute, $value, $parameters): bool
    {
        return preg_match('/^[\x{0600}-\x{06FF}\s\p{P}0-9]+$/u', $value);
    }
}