<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\PhoneNumberServiceInterface;
use App\Services\PhoneNumberService;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PhoneNumberServiceInterface::class, PhoneNumberService::class);
    }
}
