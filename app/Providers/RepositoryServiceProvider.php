<?php

namespace App\Providers;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Eloquent\CustomerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }

}
