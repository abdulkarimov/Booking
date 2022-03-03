<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends CRUD_Controller
{
    protected function getModel()
    {
        return app(Building::class);
    }
}
