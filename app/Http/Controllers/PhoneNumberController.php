<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\PhoneNumberServiceInterface;
use Illuminate\Support\Facades\Validator;

class PhoneNumberController extends Controller
{
    private $PhoneNumberService;

    public function __construct(PhoneNumberServiceInterface $PhoneNumberService)
    {
        $this->PhoneNumberService = $PhoneNumberService;
    }

    public function index()
    {
        $phone_numbers = $this->PhoneNumberService->index(10);
        return view('phone', compact('phone_numbers'));
    }

    public function filter(Request $request)
    {

        $request->validate([
            'country' => 'required|integer',
            'state' => 'required|integer'
        ]);

        $phone_numbers = $this->PhoneNumberService->filter($request);
        return view('phone', compact('phone_numbers'));
    }
}
