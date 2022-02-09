<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuildingController extends Controller
{
    public function get()
    {
        $building = DB::table('buildings')->paginate(5);
        return response()->json($building);
    }

    public function getById($id)
    {
        $building = Building::findOrFail($id);
        return response()->json($building);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'city_id' =>  'required|integer',
            'lon' => 'required|string',
            'lat' => 'required|string',
        ]);
        $buinding = Building::create($data);
        $buinding->save();
        return response()->json($buinding);
    }

    public function edit(Request $request , $id)
    {
        $buinding = Building::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'city_id' =>  'required|integer',
            'lon' => 'required|string',
            'lat' => 'required|string',
        ]);
        $buinding->update($data);
        return response()->json($buinding);
    }

    public function delete(Request $request , $id)
    {
        Building::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }


}