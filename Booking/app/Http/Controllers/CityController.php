<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends CRUD_Controller
{
//    public function get()
//    {
//        return response()->json(City::all());
//    }
    public function get()
    {
        $city = City::with('country')->paginate(5);
        return response()->json($city);
    }

    protected function getModel()
    {
        return app(City::class);
    }

}
