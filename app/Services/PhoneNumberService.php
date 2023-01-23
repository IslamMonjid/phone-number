<?php

namespace App\Services;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Services\Interfaces\PhoneNumberServiceInterface;
use App\Traits\PhoneNumberTrait;

class PhoneNumberService implements PhoneNumberServiceInterface
{
    use PhoneNumberTrait;

    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index($per_page)
    {
        $phone_numbers = $this->customerRepository->getPaginatedPhoneNumbers($per_page);
        foreach ($phone_numbers as $phone_number) {
            $phone = $phone_number['phone'];
            $country_code = $this->getPhoneNumberCountryCode($phone);
            $phone_number_without_code = $this->getPhoneNumberWithoutCountryCode($phone);
            $country = $this->getPhoneNumberCountryByCountryCode($country_code);
            $state = $this->validatePhoneNumber($country_code, $phone);
            $phone_number['country_code'] = '+'. $country_code;
            $phone_number['phone'] = $phone_number_without_code;
            $phone_number['country'] = $country;
            $phone_number['state'] = $state;
        }
        return $phone_numbers;
    }

    public function filter($request){
        $state = $request->state;
        $country_code = $request->country;
        $phone_numbers = $this->customerRepository->all();

        $filterd_phone_numbers = $this->filterPhoneNumbersByCountry($phone_numbers, $country_code);
        $filterd_phone_numbers = $this->filterPhoneNumbersByState($filterd_phone_numbers, $country_code, $state);

        foreach ($filterd_phone_numbers as $phone_number) {
            $phone = $phone_number['phone'];
            $phone_number_without_code = $this->getPhoneNumberWithoutCountryCode($phone);
            $country = $this->getPhoneNumberCountryByCountryCode($country_code);
            $phone_number['country_code'] = '+'. $country_code;
            $phone_number['phone'] = $phone_number_without_code;
            $phone_number['country'] = $country;
            $phone_number['state'] = $state == 1 ? "OK" : "NOK";
        }
        
        return $filterd_phone_numbers;
    }
}
