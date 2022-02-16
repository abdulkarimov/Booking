<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class B_CityTest extends TestCase
{
    static public $city_id;

    public function test_post()
    {

        $response = $this->postJson('http://127.0.0.1:8000/api/city', [
            'name' => '2452238',
            'country_id' => A_CountryTest::$country_id
        ]);
        self::$city_id = $response['id'];
        $response->assertStatus(201);
    }

    public function test_get()
    {
        $response = $this->get('http://127.0.0.1:8000/api/city/' );
        $response->assertStatus(200);
    }

    public function test_put()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/city/'.self::$city_id ,[
            'name' => '2452238'
        ]);
        $response->assertStatus(200);
    }


}
