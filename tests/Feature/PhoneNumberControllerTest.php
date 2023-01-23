<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhoneNumberControllerTest extends TestCase
{

    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_filter()
    {
        $response = $this->post('/',['country' => '212', 'state' => '1']);

        $response->assertStatus(200);
    }
}
