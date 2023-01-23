<?php
namespace App\Services\Interfaces;

interface PhoneNumberServiceInterface
{
   public function index($per_page);
   public function filter($request);
}