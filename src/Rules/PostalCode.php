<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class PostalCode
 * @package Mrtolouei\PersiaValidator\Rules
 */
class PostalCode implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        return preg_match("/\b(?!(\d)\1{3})[13-9]{4}[1346-9][013-9]{5}\b/",$value);
    }
}