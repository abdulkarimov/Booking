<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function get()
    {
        return response()->json(Country::all());
    }

    public function getById($id)
    {
        $city = Country::findOrFail($id);
        return response()->json($city);
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
