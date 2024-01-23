<?php

namespace Mrtolouei\PersiaValidator;

/**
 * This package has been created to contribute to the development of
 * open-source resources for the Laravel community and assists you in
 * validating Persian data.
 * @author Alireza Tolouei <mrtolouei.com@gmail.com>
 * @since Dec 24, 2023
 */
interface PersiaValidatorRule
{
    public function validate($attribute, $value, $parameters): bool;
}