<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class JalaliDateBetween
 * @package Mrtolouei\PersiaValidator\Rules
 */
class JalaliDateBetween implements PersiaValidatorRule
{
    use JalaliDateValidation;

    public function validate($attribute, $value, $parameters): bool
    {
        if(!isset($parameters[0],$parameters[1])) return false;
        if(!$this->validateJalali($parameters[0]) || !$this->validateJalali($parameters[1])) return false;
        return $this->validateJalali($value) && ($parameters[0] <= $value && $parameters[1] >= $value);
    }

    public function replacer($message, $attribute, $rule, $parameters): string
    {
        return str_replace([':firstDate', ':lastDate'], [$parameters[0], $parameters[1]], $message);
    }
}