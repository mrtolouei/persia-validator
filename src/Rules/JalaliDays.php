<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class JalaliDays
 * @package Mrtolouei\PersiaValidator\Rules
 */
class JalaliDays implements PersiaValidatorRule
{
    public function validate($attribute, $value, $parameters): bool
    {
        $days = ['شنبه','یکشنبه','یک شنبه','یک‌شنبه','دوشنبه','دو شنبه','سه شنبه','سه‌شنبه','چهارشنبه','چهار شنبه','پنجشنبه','پنج شنبه','پنج‌شنبه','جمعه'];
        return in_array($value,$days);
    }
}