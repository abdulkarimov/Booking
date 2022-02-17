<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends CRUD_Controller
{
    public function getAll(Request $request)
    {
        $validate  = (new Country)->getValidate($request);

        if($validate)
            $country = Country::where('name', $validate['name'])->get();
        else
            $country = Country::paginate(5);

        return response()->json($country);
    }

    protected function getModel()
    {
        return app(Country::class);
    }
}
