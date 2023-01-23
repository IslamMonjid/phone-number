<?php

namespace App\Traits;

trait PhoneNumberTrait
{
    public function getPhoneNumberCountryCode($phone_number)
    {
        $matches = array();
        preg_match('/(\d+)/', $phone_number, $matches);
        $country_code = count($matches) > 0 ? $matches[0] : "";
        return $country_code;
    }

    public function getPhoneNumberWithoutCountryCode($phone_number)
    {
        $phone_number = explode(" ", $phone_number);
        $phone_number = count($phone_number) > 0 ? $phone_number[1] : "";
        return $phone_number;
    }

    public function getPhoneNumberCountryByCountryCode($country_code)
    {
        $country = "";
        $country_codes = array(
            '212' => 'Morocco',
            '237' => 'Cameroon',
            '251' => 'Ethiopia',
            '256' => 'Uganda',
            '258' => 'Mozambique'
        );

        $country = array_key_exists($country_code, $country_codes) ? $country_codes[$country_code] : "";
        return $country;
    }

    public function validatePhoneNumber($country_code, $phone_number)
    {
        $validators = array(
            '212' => '/\(212\)\ ?[5-9]\d{8}/',
            '237' => '/\(237\)\ ?[2368]\d{7,8}/',
            '251' => '/\(251\)\ ?[1-59]\d{8}/',
            '256' => '/\(256\)\ ?\d{9}/',
            '258' => '/\(258\)\ ?[28]\d{7,8}/'
        );


        if (array_key_exists($country_code, $validators)) {
            $validator = $validators[$country_code];
            return preg_match($validator, $phone_number) == 1 ? "OK" : "NOK";
        } else {
            return "NOK";
        }
    }



    public function filterPhoneNumbersByCountry($phone_numbers, $country)
    {
        $numbers =  $phone_numbers->filter(function ($item) use ($country) {
            return strpos($item->phone, $country) !== false;
        });

        return $numbers;
    }

    public function filterPhoneNumbersByState($phone_numbers, $country, $state)
    {
        $validators = array(
            '212' => '/\(212\)\ ?[5-9]\d{8}/',
            '237' => '/\(237\)\ ?[2368]\d{7,8}/',
            '251' => '/\(251\)\ ?[1-59]\d{8}/',
            '256' => '/\(256\)\ ?\d{9}/',
            '258' => '/\(258\)\ ?[28]\d{7,8}/'
        );


        $numbers =  $phone_numbers->filter(function ($item) use ($country, $state, $validators) {
            $validator = $validators[$country];
            return $state == 1 ? preg_match($validator, $item) != 0 : preg_match($validator, $item) != 1; 
        });

        return $numbers;
    }
}
