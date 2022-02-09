<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function get()
    {
        return response()->json(Booking::all());
    }

    public function getById($id)
    {
        $city = Booking::findOrFail($id);
        return response()->json($city);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'cabinet_id' => 'required|integer',
            'time_start' =>  'required|date_format:Y-m-d H:i',
            'time_end' => 'required|date_format:Y-m-d H:i',
        ]);
        $booking = Booking::create($data);
        $booking->save();
        return response()->json($booking);
    }

    public function edit(Request $request , $id)
    {
        $booking = Booking::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|integer',
            'cabinet_id' => 'required|integer',
            'time_start' =>  'required|date_format:Y-m-d H:i',
            'time_end' => 'required|date_format:Y-m-d H:i',
        ]);
        $booking->update($data);
        return response()->json($booking);
    }

    public function delete(Request $request , $id)
    {
        Booking::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }




}
