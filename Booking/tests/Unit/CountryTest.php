<?php

namespace Tests\Unit;

use App\Models\Country;
use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_CountryColumName()
    {
        $country  = Country::all()->first();
        $data =$country->toArray();

        $this->assertTrue(array_key_exists("name" , $data));
    }
}
