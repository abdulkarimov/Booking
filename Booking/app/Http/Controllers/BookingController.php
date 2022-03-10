<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends CRUD_Controller
{
    protected function getModel()
    {
        return app(Booking::class);
    }

    public function getInUseCabinet(Request $request)
    {
        $cabinet = Booking::where('cabinet_id', $request->id)->where('time_start',"like", '%'.$request->time.'%')->get();   
        return response()->json($cabinet);
    }
}
