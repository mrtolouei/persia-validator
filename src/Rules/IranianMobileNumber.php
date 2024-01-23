<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class IranianMobileNumber
 * @package Mrtolouei\PersiaValidator\Rules
 */
class IranianMobileNumber implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        if(isset($parameters[0])) {
            if($parameters[0] == 'without_zero') return preg_match('/^9[0-9]{9}$/u',$value);
            if($parameters[0] == 'with_plus') return preg_match('/^[+]989[0-9]{9}$/u',$value);
        }

        return preg_match('/^09[0-9]{9}$/u',$value);
    }
}