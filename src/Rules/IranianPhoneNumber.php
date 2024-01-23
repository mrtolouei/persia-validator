<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class IranianPhoneNumber
 * @package Mrtolouei\PersiaValidator\Rules
 */
class IranianPhoneNumber implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        if(isset($parameters[0]) && $parameters[0] == 'without_code') return preg_match('/^[0-9]{8}$/u',$value);
        return preg_match('/^0[0-9]{10}$/u',$value);
    }
}