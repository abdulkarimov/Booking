<?php

namespace App\Http\Controllers;
use App\Models\Cabinet;


class CabinetController extends CRUD_Controller
{
    public function getByCity($city)
    {
        $cabinet = Cabinet::with('building.city.country')->get();
        $count = $cabinet->getIterator()->count();
        $cabinetWithCity = [];
        for( $i = 0; $i < $count; $i++ )
            if ( $cabinet[$i]['building']['city']['name'] == $city)
                $cabinetWithCity[] = $cabinet[$i];
        return response()->json($cabinetWithCity);
    }

    protected function getModel()
    {
        return app(Cabinet::class);
    }
}
