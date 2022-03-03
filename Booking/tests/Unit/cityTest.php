<?php

namespace Tests\Unit;

use App\Models\City;
use Tests\TestCase;


class cityTest extends TestCase
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

    public function test_ColumOfCity()
    {

        $colum  = City::all()->first();
        $this->assertArrayHasKey("name", $colum->toArray());
    }

    public function test_ColumOfCityFalse()
    {
        $colum  = City::all()->first();
        $this->assertFalse(array_key_exists("names" , $colum->toArray()));
    }

    public function test_columCityIdFalse()
    {
        $colum  = City::all()->first();
        $this->assertFalse(array_key_exists("ID" , $colum->toArray()));
    }
    public function test_columCityId()
    {
        $colum  = City::all()->first();
        $this->assertTrue(array_key_exists("id" , $colum->toArray()));
    }
    public function test_columFromCityWhichCountryID()
    {
        $colum  = City::all()->first();
        $this->assertTrue(array_key_exists("country_id" , $colum->toArray()));
    }
    public function test_CityController()
    {
        $a = (new \App\Http\Controllers\CityController())->getAll(\request());
        $this->assertIsNotFloat($a);
    }

}
