<?php

namespace App\Http\Controllers;
use App\Models\Cabinet;
use Illuminate\Http\Request;

class CabinetController extends CRUD_Controller
{
//    public function getByCity($name)
//    {
////        $cabinet = Cabinet::with('building.city.country')->get();
////        $cabinet = Cabinet::with('building.city')->whereHas('building.city', function ($query) use ($city) {
////            return $query->where('name', '=', $city);
////        })->get();
//
//            dd($name);
//            $ct = City::where('name' , '=',$name)->get();
////        $count = $cabinet->getIterator()->count();
////        $cabinetWithCity = [];
////        for( $i = 0; $i < $count; $i++ )
////            if ( $cabinet[$i]['building']['city']['name'] == $city)
////                $cabinetWithCity[] = $cabinet[$i];
////        return response()->json($cabinetWithCity);
//
//        return response()->json($ct);
//
//
//    }

    public function getAll(Request $request)
    {
        $validate  = (new Cabinet)->getValidate($request);
        //todo фильтрация по данным из $validator'a
         return response()->json($validate);
    }

    protected function getModel()
    {
        return app(Cabinet::class);
    }
}
