<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class A_CountryTest extends TestCase
{

    static public $country_id;

    public function test_post()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/country', [
            'name' => 'asdf',
        ]);
        self::$country_id = $response['id'];
        $response->assertStatus(201);
    }
    public function test_post422()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/country', [
            'name' => 1,
        ]);
        $response->assertStatus(422);
    }

    public function test_get()
    {
        $response = $this->get('http://127.0.0.1:8000/api/country/');
        $response->assertStatus(200);
    }
    public function test_get404()
    {
        $response = $this->get('http://127.0.0.1:8000/api/countries/' );
        $response->assertStatus(404);
    }
    public function test_put()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/country/'.self::$country_id ,[
            'name' => '789456'
        ]);
        $response->assertStatus(200);
    }

    public function test_put422()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/country/'.self::$country_id ,[
            'name' => 1
        ]);
        $response->assertStatus(422);
    }

    public function test_put404()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/country/'.'156484516523' ,[
            'name' => 1
        ]);
        $response->assertStatus(404);
    }


}
