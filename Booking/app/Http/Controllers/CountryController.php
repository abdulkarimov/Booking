<?php

namespace App\Http\Controllers;

use App\Models\Country;

class CountryController extends CRUD_Controller
{
    protected function getModel()
    {
        return app(Country::class);
    }
}
