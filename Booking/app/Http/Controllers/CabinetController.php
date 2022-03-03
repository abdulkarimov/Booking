<?php

namespace App\Http\Controllers;
use App\Models\Cabinet;
use Illuminate\Http\Request;

class CabinetController extends CRUD_Controller
{
    protected function getModel()
    {
        return app(Cabinet::class);
    }
}
