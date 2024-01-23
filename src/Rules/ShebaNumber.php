<?php

namespace Mrtolouei\PersiaValidator\Rules;

use Mrtolouei\PersiaValidator\PersiaValidatorRule;

/**
 * Class ShebaNumber
 * @package Mrtolouei\PersiaValidator\Rules
 */
class ShebaNumber implements PersiaValidatorRule
{

    public function validate($attribute, $value, $parameters): bool
    {
        if(!preg_match('/^IR[0-9]{24}$/u', $value)) return false;
        $shebaNumber = substr($value, 4);
        $part1 = ord($value[0]) - 65 + 10;
        $part2 = ord($value[1]) - 65 + 10;
        $shebaNumber .= $part1 . $part2 . substr($value, 2, 2);

        while (strlen($shebaNumber) > 2) {
            $block = substr($shebaNumber, 0, 9);
            $shebaNumber = (int)$block % 97 . substr($shebaNumber, strlen($block));
        }

        $iso7064Mod97_10 = (int)$shebaNumber % 97;

        return $iso7064Mod97_10 === 1;
    }
}