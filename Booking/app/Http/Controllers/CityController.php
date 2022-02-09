<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function get()
    {
        return response()->json(City::all());
    }

    public function getById( $id)
    {
        $city = City::findOrFail($id);
        return response()->json($city);
    }

    public function add(Request $request)
    {
        $data =  $request->json()->all();
        $name = $data['name'];
        $country_id = $data['country_id'];
        $city = new City();
        $city->name = $name;
        $city->country_id = $country_id;
        $city->save();

        return response()->json($name);
    }

    public function edit(Request $request , $id)
    {
        $data =  $request->json()->all();
        $name = $data['name'];
        //Todo Handler
        $city = City::findOrFail($id);
        $city->name =$name;
        $city->save();
        return response()->json($city);
    }

    public function delete(Request $request , $id)
    {
        City::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }

}
