# Persian Validator for Laravel

[![Latest Version](https://img.shields.io/github/v/release/mrtolouei/persia-validator)](https://github.com/mrtolouei/persia-validator/releases)
[![License](https://img.shields.io/github/license/mrtolouei/persia-validator)](https://github.com/mrtolouei/persia-validator/blob/main/LICENSE)

The **Persia Validator** package is a Laravel package designed to provide comprehensive Persian (Farsi) validation for web applications built on the Laravel framework. It offers a set of custom validation rules tailored for Persian language-specific input data, such as Persian alphabet strings, Iranian mobile numbers, Jalali dates, and more.

## Requirement
- Laravel 8,9,10
- PHP 7.4, 8

## Install
Via composer
```bash
composer require mrtolouei/persia-validator
```

or use git clone
```bash
git clone https://github.com/mrtolouei/persia-validator.git
```

## Vendor Publish
To publish the configuration and language files provided by the Persia Validator package, you can use the vendor:publish Artisan command. This command allows you to customize the package configuration and translation files according to your project's needs.
```bash
php artisan vendor:publish --provider="Mrtolouei\PersiaValidator\PersiaValidatorServiceProvider"
```

## Usage
Example of using the fa_string rule in Laravel validation:
```php
$request->validate([
    'name' => 'fa_string',
]);
```

## Validation Rules Overview
The **Persia Validator** package offers custom Laravel validation rules for Persian (Farsi) input, including Persian alphabet strings, numeric values, dates, and more.
You can access the validation rules by providing the corresponding rule key as outlined in the following table:

| Rule                     | Description                                              | Example                                                           |
|--------------------------|----------------------------------------------------------|-------------------------------------------------------------------|
| `fa_string`              | Persian alphabet string validation.                      | علیرضا                                                            |
| `fa_numeric`             | Persian numeric string validation.                       | ۱۲۳۴                                                              |
| `fa_string_eng_numeric`  | Persian alphabet with English numeric string validation. | علیرضا 1234                                                       |
| `fa_not_accept`          | String should not contain Persian alphabet characters.   | Alireza                                                           |
| `fa_date`                | Persian Jalali date validation.                          | 1376/01/01                                                        |
| `fa_date_between`        | Persian Jalali date within a range validation.           | 1376/01/01                                                        |
| `fa_month`               | Persian month validation.                                | خرداد                                                             |
| `fa_day`                 | Persian day validation.                                  | شنبه                                                              |
| `fa_mobile`              | Iranian mobile number validation.                        | 09121234567                                                       |
| `fa_mobile:without_zero` | Iranian mobile number validation without zero.           | 9121234567                                                        |
| `fa_mobile:with_plus`    | Iranian mobile number validation with plus.              | +989121234567                                                     |
| `fa_phone`               | Iranian phone number validation.                         | 02131234567                                                       |
| `fa_phone:without_code`  | Iranian phone number validation with city code.          | 31234567                                                          |
| `fa_id`                  | Iranian national identification number validation.       | 5641981540                                                        |
| `fa_credit_card`         | Credit card number in Persian digits validation.         | 5892101270263185 <br> 5892 1012 7026 3185 <br> 5892-1012-7026-3185 |
| `fa_sheba`               | Iranian Sheba number validation.                         | IR420150000001005303384708                                        |
| `fa_postal_code`         | Iranian postal code validation.                          | 1345678939                                                        |
| `separated_numeric`      | Number with comma separator.                             | 100,000                                                           |


## Contributing
Contributions are welcome! If you have ideas for new features, improvements, or if you encounter any issues, feel free to open an issue or submit a pull request.

## License
This package is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).




