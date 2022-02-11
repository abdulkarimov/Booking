<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function get()
    {
        $cabinet = Cabinet::with('building.city.country')->paginate(5);
        return response()->json($cabinet);
    }
      public function getByCabinetName($cabinetNumber)
    {
        $cabinet = Cabinet::where('number_cabinet', $cabinetNumber)->get();
        return response()->json($cabinet);
    }

    protected function getModel()
    {
        return app(Cabinet::class);
    }


}
