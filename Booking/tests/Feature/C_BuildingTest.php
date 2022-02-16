<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class C_BuildingTest extends TestCase
{
    static public $building_id;

    public function test_post()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/building', [
            'name' => '2452238',
            'address' => 'address',
            'lon' => 'lon',
            'lat' => 'lat',
            'city_id' => B_CityTest::$city_id
        ]);
        self::$building_id = $response['id'];
        $response->assertStatus(201);
    }

    public function test_get()
    {
        $response = $this->get('http://127.0.0.1:8000/api/building/' );
        $response->assertStatus(200);
    }

    public function test_put()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/building/'.self::$building_id ,[
            'name' => '2452238'
        ]);
        $response->assertStatus(200);
    }
}
