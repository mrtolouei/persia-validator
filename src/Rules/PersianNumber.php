<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class PersianNumber
 * @package Mrtolouei\PersiaValidator\Rules
 */
class PersianNumber implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        return preg_match('/^[\x{6F0}-\x{6F9}]+$/u', $value);
    }
}