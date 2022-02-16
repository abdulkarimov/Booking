<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EF_DeleteTests extends TestCase
{
    public function test_delete_country()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/country/'.A_CountryTest::$country_id);
        $response->assertStatus(204);
    }

    public function test_delete_city()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/country/'.B_CityTest::$city_id);
        $response->assertStatus(204);
    }

    public function test_delete_building()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/building/'.C_BuildingTest::$building_id);
        $response->assertStatus(204);
    }
    public function test_delete_cabinet()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/cabinet/'.D_CabinetTest::$cabinet);
        $response->assertStatus(204);
    }
    public function test_delete_booking()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/booking/'.E_BookingTest::$booking);
        $response->assertStatus(204);
    }
}
