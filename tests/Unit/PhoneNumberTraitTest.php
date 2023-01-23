<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PhoneNumberTraitTest extends TestCase
{

    protected $phoneNumberTrait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->phoneNumberTrait = $this->getMockBuilder('App\Traits\PhoneNumberTrait')->getMockForTrait();
    }


    public function test_get_phone_number_country_code()
    {
        $phone_number = '(212) 6007989253';
        $country_code = $this->phoneNumberTrait->getPhoneNumberCountryCode($phone_number);

        $this->assertEquals('212', $country_code);

    }

    public function test_phone_number_without_country_code()
    {
        $phone_number = '(212) 6007989253';
        $phone_number = $this->phoneNumberTrait->getPhoneNumberWithoutCountryCode($phone_number);

        $this->assertEquals('6007989253', $phone_number);
    }

    public function test_get_phone_number_country_by_country_code()
    {
        $country_code = '212';
        $country = $this->phoneNumberTrait->getPhoneNumberCountryByCountryCode($country_code);

        $this->assertEquals('Morocco', $country);
    }

    public function test_validate_phone_number()
    {
        $phone_number = '(212) 6007989253';
        $country_code = '212';
        $state = $this->phoneNumberTrait->validatePhoneNumber($country_code, $phone_number);

        $this->assertEquals('OK', $state);
    }
}
