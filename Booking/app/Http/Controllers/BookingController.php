<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends CRUD_Controller
{
    public function getAll(Request $request)
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
