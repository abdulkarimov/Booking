<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function get()
    {
        $cabinet = Cabinet::with('building.city.country')->paginate(5);
        return response()->json($cabinet);
    }
      public function getByCabinetName($cabinetNumber)
    {
        $cabinet = Cabinet::where('number_cabinet', $cabinetNumber)->get();
        return response()->json($cabinet);
    }

    public function getById($id)
    {
        $city = Cabinet::findOrFail($id);
        return response()->json($city);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'number_cabinet' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'building_id' => 'required|integer',
        ]);
        $cabinet = Cabinet::create($data);
        $cabinet->save();
        return response()->json($cabinet );
    }

    public function edit(Request $request , $id)
    {
        $cabinet = Cabinet::findOrFail($id);

        $data = $request->validate([
            'number_cabinet' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'building_id' => 'required|integer',
        ]);
        $cabinet->update($data);
        return response()->json($cabinet);
    }

    public function delete(Request $request , $id)
    {
        Cabinet::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }

}
