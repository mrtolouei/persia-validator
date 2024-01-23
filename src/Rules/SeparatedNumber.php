<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class SeparatedNumber
 * @package Mrtolouei\PersiaValidator\Rules
 */
class SeparatedNumber implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        return preg_match("/^\d{1,3}(?:([,.])\d{3})*(?:\1\d{3})*(?:\.\d+)?$/u",$value);
    }
}