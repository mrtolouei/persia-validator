<?php

namespace Mrtolouei\PersiaValidator\Rules;

trait JalaliDateValidation
{
    public function validateJalali($value): bool
    {
        $date = preg_split('/[-\/]/', $value);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];

        $monthDays = [31,31,31,31,31,31,30,30,30,30,30,29];
        $leapYear = $year % 33;
        if(in_array($leapYear,[1 , 5 , 9 , 13 ,17 , 22 , 26 , 30])) $monthDays[11] = 30;

        if($year < 0) return false;
        if($month < 1 || $month > 12) return false;
        if($day < 1 || $day > $monthDays[$month - 1]) return false;
        return true;
    }
}