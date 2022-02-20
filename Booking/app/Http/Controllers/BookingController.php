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





}
