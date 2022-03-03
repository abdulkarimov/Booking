<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class E_BookingTest extends TestCase
{
    static public $booking_id;

    public function test_post()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/booking', [
            'user_id' => 1,
            'cabinet_id' => D_CabinetTest::$cabinet_id,
            'time_start' => '2022-02-16 22:43',
            'time_end' => '2022-02-16 22:43',
        ]);

        self::$booking_id = $response['id'];

        $response->assertStatus(201);
    }

    public function test_get()
    {
        $response = $this->get('http://127.0.0.1:8000/api/booking/' );
        $response->assertStatus(200);
    }

    public function test_put()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/booking/'.self::$booking_id ,[
            'time_start' => '2022-03-16 22:43'
        ]);
        $response->assertStatus(200);
    }

    public function test_post422()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/booking', [
            'time_start' => 1,
        ]);
        $response->assertStatus(422);
    }
    public function test_get404()
    {
        $response = $this->get('http://127.0.0.1:8000/api/cibookingty/' );
        $response->assertStatus(404);
    }
    public function test_put422()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/booking/'.self::$booking_id ,[
            'time_start' => 1
        ]);
        $response->assertStatus(422);
    }

    public function test_put404()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/booking/'.'156484516523' ,[
            'time_start' => 1
        ]);
        $response->assertStatus(404);
    }



}
