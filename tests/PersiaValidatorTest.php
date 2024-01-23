<?php

namespace Tests;

use Mrtolouei\PersiaValidator\Rules\CreditCard;
use Mrtolouei\PersiaValidator\Rules\IranianMobileNumber;
use Mrtolouei\PersiaValidator\Rules\IranianNationalId;
use Mrtolouei\PersiaValidator\Rules\IranianPhoneNumber;
use Mrtolouei\PersiaValidator\Rules\JalaliDate;
use Mrtolouei\PersiaValidator\Rules\JalaliDateBetween;
use Mrtolouei\PersiaValidator\Rules\JalaliDays;
use Mrtolouei\PersiaValidator\Rules\JalaliMonths;
use Mrtolouei\PersiaValidator\Rules\PersianAlphabet;
use Mrtolouei\PersiaValidator\Rules\PersianAlphabetEnglishNumber;
use Mrtolouei\PersiaValidator\Rules\PersianAlphabetNotAccept;
use Mrtolouei\PersiaValidator\Rules\PersianNumber;
use Mrtolouei\PersiaValidator\Rules\PostalCode;
use Mrtolouei\PersiaValidator\Rules\SeparatedNumber;
use Mrtolouei\PersiaValidator\Rules\ShebaNumber;
use PHPUnit\Framework\TestCase;

class PersiaValidatorTest extends TestCase
{
    /**
     * Unit test of Persian String
     * @return void
     */
    public function testFaString()
    {
        $rule = new PersianAlphabet();
        
        $this->assertFalse($rule->validate(null, 'This is english content.', null));
        $this->assertFalse($rule->validate(null, 'این یک متن فارسی با عدد 111 انگلیسی است.', null));
        $this->assertTrue($rule->validate(null,'این یک متن فارسی است.',null));
        $this->assertTrue($rule->validate(null, 'این یک متن فارسی با عدد ۱۲۳۴ فارسی است.', null));
        $this->assertTrue($rule->validate(null,'این، یک مَتن فارسی با علائم؛ (می باشَد)!؟',null));
    }

    /**
     * Unit test of Persian Numbers
     * @return void
     */
    public function testFaNumeric()
    {
        $rule = new PersianNumber();
        
        $this->assertFalse($rule->validate(null,'1234',null));
        $this->assertFalse($rule->validate(null,'۱۲34',null));
        $this->assertTrue($rule->validate(null,'۱۲۳۴',null));
    }

    /**
     * Unit test of Persian String with English numbers
     * @return void
     */
    public function testFaStringEngNumeric()
    {
        $rule = new PersianAlphabetEnglishNumber();
        
        $this->assertFalse($rule->validate(null,'This is english content.',null));
        $this->assertTrue($rule->validate(null,'این یک متن فارسی با عدد 111 انگلیسی است.',null));
        $this->assertTrue($rule->validate(null,'این یک متن فارسی است.',null));
        $this->assertTrue($rule->validate(null,'این یک متن فارسی با عدد ۱۲۳۴ فارسی است.',null));
        $this->assertTrue($rule->validate(null,'این، یک مَتن فارسی با علائم؛ (می باشَد)!؟',null));
    }

    public function testFaStringNotAccept()
    {
        $rule = new PersianAlphabetNotAccept();
        
        $this->assertTrue($rule->validate(null,'This is english content.',null));
        $this->assertFalse($rule->validate(null,'این یک متن فارسی است.',null));
    }

    public function testJalaliDate()
    {
        $rule = new JalaliDate();
        
        $this->assertTrue($rule->validate(null,'1402/01/01',null));
        $this->assertTrue($rule->validate(null,'1402-01-01',null));
        $this->assertTrue($rule->validate(null,'1403/12/30',null));
        $this->assertTrue($rule->validate(null,'1402/09/20',null));
        $this->assertFalse($rule->validate(null,'1402/12/30',null));
        $this->assertFalse($rule->validate(null,'14020101',null));
    }

    public function testBetweenJalaliDate()
    {
        $rule = new JalaliDateBetween();
        
        $this->assertTrue($rule->validate(null,'1402/10/20',['1402/10/01','1402/10/30']));
        $this->assertFalse($rule->validate(null,'1402/09/20',['1402/10/01','1402/10/30']));
    }

    public function testJalaliDateMonths()
    {
        $rule = new JalaliMonths();
        
        $this->assertTrue($rule->validate(null,'فروردین',null));
        $this->assertTrue($rule->validate(null,'اردیبهشت',null));
        $this->assertTrue($rule->validate(null,'خرداد',null));
        $this->assertTrue($rule->validate(null,'تیر',null));
        $this->assertTrue($rule->validate(null,'مرداد',null));
        $this->assertTrue($rule->validate(null,'شهریور',null));
        $this->assertTrue($rule->validate(null,'مهر',null));
        $this->assertTrue($rule->validate(null,'آبان',null));
        $this->assertTrue($rule->validate(null,'آذر',null));
        $this->assertTrue($rule->validate(null,'دی',null));
        $this->assertTrue($rule->validate(null,'بهمن',null));
        $this->assertTrue($rule->validate(null,'اسفند',null));
        $this->assertFalse($rule->validate(null,'شحریور',null));
    }
    
    public function testJalaliDateDays()
    {
        $rule = new JalaliDays();
        
        $this->assertTrue($rule->validate(null,'شنبه',null));
        $this->assertTrue($rule->validate(null,'یکشنبه',null));
        $this->assertTrue($rule->validate(null,'دوشنبه',null));
        $this->assertTrue($rule->validate(null,'سه شنبه',null));
        $this->assertTrue($rule->validate(null,'چهارشنبه',null));
        $this->assertTrue($rule->validate(null,'پنجشنبه',null));
        $this->assertTrue($rule->validate(null,'جمعه',null));
        $this->assertFalse($rule->validate(null,'وندزدی',null));
    }

    public function testMobileNumber()
    {
        $rule = new IranianMobileNumber();
        
        $this->assertTrue($rule->validate(null,'9121234567',['without_zero']));
        $this->assertTrue($rule->validate(null,'+989121234567',['with_plus']));
        $this->assertTrue($rule->validate(null,'09121234567',null));
        $this->assertFalse($rule->validate(null,'+999121234567',['with_plus']));
        $this->assertFalse($rule->validate(null,'0123456789',null));
    }

    public function testPhoneNumber()
    {
        $rule = new IranianPhoneNumber();
        
        $this->assertTrue($rule->validate(null,'02112345678',null));
        $this->assertTrue($rule->validate(null,'12345678',['without_code']));
        $this->assertFalse($rule->validate(null,'7456321478',null));
    }

    public function testNationalId()
    {
        $rule = new IranianNationalId();
        
        $this->assertTrue($rule->validate(null,'5641981540',null));
        $this->assertTrue($rule->validate(null,'8569691981',null));
        $this->assertTrue($rule->validate(null,'5658185777',null));
        $this->assertTrue($rule->validate(null,'5320100019',null));
        $this->assertTrue($rule->validate(null,'1011110105',null));
        $this->assertFalse($rule->validate(null,'1234567899',null));
    }

    public function testCreditCard()
    {
        $rule = new CreditCard();
        
        $this->assertTrue($rule->validate(null,'5892101270263185',null));
        $this->assertTrue($rule->validate(null,'5892 1012 7026 3185',null));
        $this->assertTrue($rule->validate(null,'5892-1012-7026-3185',null));
        $this->assertFalse($rule->validate(null,'5892101270263186',null));
        $this->assertFalse($rule->validate(null,'5892101270263187',null));
    }

    public function testShebaNumber()
    {
        $rule = new ShebaNumber();
        
        $this->assertTrue($rule->validate(null,'IR420150000001005303384708',null));
        $this->assertFalse($rule->validate(null,'IR42015000000100530338',null));
        $this->assertFalse($rule->validate(null,'420150000001005303384708',null));
    }

    public function testPostalCode()
    {
        $rule = new PostalCode();
        
        $this->assertTrue($rule->validate(null,'1345678939',null));
        $this->assertTrue($rule->validate(null,'9876870773',null));
        $this->assertFalse($rule->validate(null,'9876877772',null));
        $this->assertFalse($rule->validate(null,'9870677665',null));
    }

    public function testSeparatedNumbers()
    {
        $rule = new SeparatedNumber();
        
        $this->assertTrue($rule->validate(null,'100',null));
        $this->assertTrue($rule->validate(null,'1,000',null));
        $this->assertTrue($rule->validate(null,'1,000,000',null));
        $this->assertTrue($rule->validate(null,'100,000.5',null));
        $this->assertTrue($rule->validate(null,'10.5',null));
        $this->assertTrue($rule->validate(null,'1,000.0005',null));
        $this->assertFalse($rule->validate(null,'isNotNumber',null));
    }
}
