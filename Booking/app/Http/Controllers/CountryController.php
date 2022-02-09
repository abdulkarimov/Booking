<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function get()
    {
        $country = DB::table('countries')->paginate(5);
        return response()->json($country);
        // http://127.0.0.1:8000/api/country/?page=1
    }

    public function getById($id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    public function add(Request $request)
    {
        $data =  $request->json()->all();
        $name = $data['name'];
        $country = new Country();
        $country->name = $name;
        $country->save();

        return response()->json($name);
    }

    public function edit(Request $request , $id)
    {
        $data =  $request->json()->all();
        $name = $data['name'];
        $country = Country::findOrFail($id);
        $country->name =$name;
        $country->save();
        return response()->json($country);
    }

    public function delete(Request $request , $id)
    {
        Country::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }
}
