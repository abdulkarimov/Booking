<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function get()
    {
        $building = Building::with('city.country')->paginate(5);
        return response()->json($building);
    }

    protected function getModel()
    {
        return app(Building::class);
    }

}
