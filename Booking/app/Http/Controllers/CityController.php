<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends CRUD_Controller
{

    public function getAll(Request $request)
    {
        $validate  = (new City)->getValidate($request);
        if($request['country_name'])
        {
            $city = City::with('country')->whereHas('country', function ($query) use ($validate) {
              return $query->where('name', '=', $validate['country_name']);
             });
        }
        elseif($request['name'])
            $city = City::where('name', $validate['name']);
        else
            $city = City::with('country');

     return response()->json($city->paginate(5));

    }

    protected function getModel()
    {
        return app(City::class);
    }

}
