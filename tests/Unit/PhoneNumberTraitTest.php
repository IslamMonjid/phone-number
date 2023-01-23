<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class PhoneNumberTraitTest extends TestCase
{

    protected $phoneNumber;

    protected function setUp(): void
    {
        parent::setUp();
        $this->phoneNumber = $this->getMockBuilder('App\Traits\PhoneNumberTrait')->getMockForTrait();
    }

    /**
     *
     * @Test
     */
    public function test_get_phone_number_country_code()
    {
        $phone_number = '(212) 6007989253';
        $country_code = $this->phoneNumber->getPhoneNumberCountryCode($phone_number);

        $this->assertEquals(212, $country_code);

    }
}
