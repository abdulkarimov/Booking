<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends CRUD_Controller
{
    public function getAll(Request $request)
    {
        $building = Building::with('city.country')->paginate(5);
        return response()->json($building);
    }

    protected function getModel()
    {
        return app(Building::class);
    }

}
