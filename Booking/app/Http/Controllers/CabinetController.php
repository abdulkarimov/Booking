<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CabinetController extends Controller
{
    public function get()
    {
        $cabinet = DB::table('cabinets')->paginate(5);
        return response()->json($cabinet);
    }

    public function getById($id)
    {
        $cabinet = Cabinet::findOrFail($id);
        return response()->json($cabinet);
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
