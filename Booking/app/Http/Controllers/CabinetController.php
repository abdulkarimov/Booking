<?php

namespace App\Http\Controllers;
use App\Models\Cabinet;


class CabinetController extends CRUD_Controller
{
    public function getByCity($city)
    {
//        $cabinet = Cabinet::with('building.city.country')->get();
        dd('asdasd');
        $cabinet = Cabinet::with('building.city.country')->whereHas('building.city', function ($query) use ($city) {
            return $query->where('name', '=', $city);
        })->get();


//        $count = $cabinet->getIterator()->count();
//        $cabinetWithCity = [];
//        for( $i = 0; $i < $count; $i++ )
//            if ( $cabinet[$i]['building']['city']['name'] == $city)
//                $cabinetWithCity[] = $cabinet[$i];
//        return response()->json($cabinetWithCity);

        return response()->json($cabinet);


    }

    protected function getModel()
    {
        return app(Cabinet::class);
    }
}
