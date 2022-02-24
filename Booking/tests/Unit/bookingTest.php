<?php

namespace Tests\Unit;

use App\Models\Booking;
use Tests\TestCase;

class bookingTest extends TestCase
{
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_ColumOfBookingTrue()
    {

        $colum = Booking::all()->first();
        $this->assertArrayHasKey("time_start", $colum->toArray());
    }

    public function test_columBookingId()
    {
        $colum = Booking::all()->first();
        $this->assertTrue(array_key_exists("id", $colum->toArray()));
    }

    public function test_columFromBookingWhichUserIdTrue()
    {
        $colum = Booking::all()->first();
        $this->assertTrue(array_key_exists("user_id", $colum->toArray()));
    }

    public function test_columFromBookingWhichUserIdFalse()
    {
        $colum = Booking::all()->first();
        $this->assertFalse(array_key_exists("userid", $colum->toArray()));
    }

    public function test_qwerty()
    {
        $a = (new \App\Http\Controllers\BookingController)->getAll(\request());
        $this->assertIsNotFloat($a);
    }
}
