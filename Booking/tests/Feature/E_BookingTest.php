<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class E_BookingTest extends TestCase
{
    static public $booking;

    public function test_post()
    {
        $response = $this->postJson('http://127.0.0.1:8000/api/booking', [
            'user_id' => 1,
            'cabinet_id' => D_CabinetTest::$cabinet,
            'time_start' => '2022-02-16 22:43',
            'time_end' => '2022-02-16 22:43',
        ]);

        self::$booking = $response['id'];

        $response->assertStatus(201);
    }

    public function test_get()
    {
        $response = $this->get('http://127.0.0.1:8000/api/booking/' );
        $response->assertStatus(200);
    }

    public function test_put()
    {
        $response = $this->putJson('http://127.0.0.1:8000/api/booking/'.self::$booking ,[
            'time_start' => '2022-03-16 22:43'
        ]);
        $response->assertStatus(200);
    }
}
