<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends CRUD_Controller
{

    protected function getModel()
    {
        return app(City::class);
    }

}
