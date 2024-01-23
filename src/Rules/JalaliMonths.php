<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class JalaliMonths
 * @package Mrtolouei\PersiaValidator\Rules
 */
class JalaliMonths implements PersiaValidatorRule
{
    public function validate($attribute, $value, $parameters): bool
    {
        $months = ['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند'];
        return in_array($value,$months);
    }
}