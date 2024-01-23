<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class JalaliDate
 * @package Mrtolouei\PersiaValidator\Rules
 */
class JalaliDate implements PersiaValidatorRule
{
    use JalaliDateValidation;

    public function validate($attribute, $value, $parameters): bool
    {
        return $this->validateJalali($value);
    }
}