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
    public function test_putFalse()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/city/2222'.self::$city_id ,[
            'name' => '2452238'
        ]);
        $response->assertStatus(404);
    }
    public function test_post422()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/city', [
            'name' => 1,
        ]);
        $response->assertStatus(422);
    }
    public function test_get404()
    {
        $response = $this->get('http://127.0.0.1:8000/api/cisty/' );
        $response->assertStatus(404);
    }
    public function test_put422()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/city/'.self::$city_id ,[
            'name' => 1
        ]);
        $response->assertStatus(422);
    }

    public function test_put404()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/city/'.'156484516523' ,[
            'name' => 1
        ]);
        $response->assertStatus(404);
    }


}
