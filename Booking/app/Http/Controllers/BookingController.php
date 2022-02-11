<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function get()
    {
        $booking = Booking::with('cabinet')->paginate(5);
        return response()->json($booking);
        //todo with user
    }
    protected function getModel()
    {
        return app(Booking::class);
    }





}
