<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Repositories\Eloquent\CustomerRepository;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator ;
use Mockery;

class DbCustomerRepositoryTest extends TestCase
{

    public function test_paginate_customers()
    {
        $per_page = 10;
        $customer = Mockery::mock('App\Models\Customer');
        $customer->shouldReceive('simplePaginate')->with($per_page)->andReturn(new Paginator (new Collection,41,$per_page));

        $repo = new CustomerRepository($customer);

        $this->assertEquals(new Paginator (new Collection,41,$per_page), $repo->getPaginatedPhoneNumbers($per_page));
    }

    public function test_all_customers()
    {
        $customer = Mockery::mock('App\Models\Customer');
        $customer->shouldReceive('all')->andReturn(new Collection);

        $repo = new CustomerRepository($customer);

        $this->assertEquals(new Collection, $repo->all());
    }
}
