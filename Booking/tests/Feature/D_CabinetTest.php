<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class D_CabinetTest extends TestCase
{
    static public $cabinet;

    public function test_post()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/cabinet', [
            'number_cabinet' => '2014',
            'description' => 'this->faker->title()',
            'status' => false,
            'building_id' => C_BuildingTest::$building_id
        ]);
        self::$cabinet = $response['id'];
        $response->assertStatus(201);
    }

    public function test_get()
    {
        $response = $this->get('http://127.0.0.1:8000/api/cabinet/' );
        $response->assertStatus(200);
    }

    public function test_put()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/cabinet/'.self::$cabinet ,[
            'number_cabinet' => '2452238'
        ]);
        $response->assertStatus(200);
    }
}
