<?php

namespace Mrtolouei\PersiaValidator;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

/**
 * @author Alireza Tolouei <mrtolouei.com@gmail.com>
 * @since Dec 24, 2023
 */
class PersiaValidatorServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerValidators();
    }

    /**
     * Register translations for the package.
     *
     * @return void
     */
    protected function registerTranslations(): void
    {
        $packageLanguagesPath = __DIR__.'/../lang/';

        $languagesPath = (int) App::version() >= 9 ? base_path('lang/') : resource_path('lang/');
        $languagesNamespace = 'persia-validation';

        $this->publishes([
            $packageLanguagesPath => $languagesPath,
        ],$languagesNamespace);

        if (count(glob($languagesPath . "*/persia-validation-messages.php")) !== 0)
            $packageLanguagesPath = $languagesPath;
        
        $this->loadTranslationsFrom($packageLanguagesPath, $languagesNamespace);
    }

    /**
     * Register custom validators for the package.
     *
     * @return void
     */
    protected function registerValidators(): void
    {
        $validators = [
            'fa_string' => 'PersianAlphabet',
            'fa_numeric' => 'PersianNumber',
            'fa_string_eng_numeric' => 'PersianAlphabetEnglishNumber',
            'fa_not_accept' => 'PersianAlphabetNotAccept',
            'fa_date' => 'JalaliDate',
            'fa_date_between' => 'JalaliDateBetween',
            'fa_month' => 'JalaliMonths',
            'fa_day' => 'JalaliDays',
            'fa_mobile' => 'IranianMobileNumber',
            'fa_phone' => 'IranianPhoneNumber',
            'fa_id' => 'IranianNationalId',
            'fa_credit_card' => 'CreditCard',
            'fa_sheba' => 'ShebaNumber',
            'fa_postal_code' => 'PostalCode',
            'separated_numeric' => 'SeparatedNumber',
        ];

        $languagesNamespace = 'persia-validation';

        foreach($validators as $name => $class) {
            $translationKey = "{$languagesNamespace}::persia-validation-messages.{$name}";
            Validator::extend($name,"Mrtolouei\\PersiaValidator\\Rules\\$class@validate",__($translationKey));

            if(method_exists("Mrtolouei\\PersiaValidator\\$class","replacer")) {
                Validator::replacer($name,"Mrtolouei\\PersiaValidator\\Rules\\$class@replacer");
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
