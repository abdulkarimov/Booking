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

    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_ColumOfCountry()
    {

        $colum  = Country::all()->first();
        $this->assertArrayHasKey("name", $colum->toArray());
    }

    public function test_ColumOfCountryFalse()
    {
        $colum  = Country::all()->first();
        $this->assertFalse(array_key_exists("names" , $colum->toArray()));
    }

    public function test_columCountryIdFalse()
    {
        $colum  = Country::all()->first();
        $this->assertFalse(array_key_exists("ID" , $colum->toArray()));
    }
    public function test_columCountryId()
    {
        $colum  = Country::all()->first();
        $this->assertTrue(array_key_exists("id" , $colum->toArray()));
    }

    public function test_CountryColumName()
    {
        $country  = Country::all()->first();
        $data =$country->toArray();

        $this->assertTrue(array_key_exists("name" , $data));
    }


    public function test_CountryController()
    {
        $a = (new \App\Http\Controllers\CountryController())->getAll(\request());
        $this->assertIsNotFloat($a);
    }

}
