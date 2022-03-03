<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class D_CabinetTest extends TestCase
{
    static public $cabinet_id;

    public function test_post()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/cabinet', [
            'number_cabinet' => '2014',
            'description' => 'this->faker->title()',
            'status' => false,
            'building_id' => C_BuildingTest::$building_id
        ]);
        self::$cabinet_id = $response['id'];
        $response->assertStatus(201);
    }

    public function test_get()
    {
        $response = $this->get('http://127.0.0.1:8000/api/cabinet/' );
        $response->assertStatus(200);
    }

    public function test_put()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/cabinet/'.self::$cabinet_id ,[
            'number_cabinet' => '2452238'
        ]);
        $response->assertStatus(200);
    }
    public function test_putFalse()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/cabinet/2222'.self::$cabinet_id ,[
            'number_cabinet' => '2452238'
        ]);
        $response->assertStatus(404);
    }
    public function test_post422()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/cabinet', [
            'number_cabinet' => 1,
        ]);
        $response->assertStatus(422);
    }
    public function test_get404()
    {
        $response = $this->get('http://127.0.0.1:8000/api/ccabinetity/' );
        $response->assertStatus(404);
    }
    public function test_put422()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/cabinet/'.self::$cabinet_id ,[
            'number_cabinet' => 1
        ]);
        $response->assertStatus(422);
    }

    public function test_put404()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/cabinet/'.'156484516523' ,[
            'number_cabinet' => 1
        ]);
        $response->assertStatus(404);
    }
}
