<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Booking;
use App\Models\Building;
use App\Models\Cabinet;
use App\Models\Country;

class CRUD_Controller extends Controller
{
    protected function getModel(Request $request)
    {
        $url = $request->url();

        if(strpos( $url , 'booking'))
            return app(Booking::class);

        elseif (strpos( $url , 'building'))
             return app(Building::class);

        elseif (strpos( $url , 'cabinet'))
             return app(Cabinet::class);   

        elseif (strpos( $url , 'city'))
             return app(City::class);

        elseif (strpos( $url , 'country'))
             return app(Country::class);
    }

    public function add(Request $request)
    {
        $add = $this->getModel()::create($this->getModel($request)->getPostValidate($request));
        return response()->json($add, 201);
    }

    
    
    public function getById($id)
    {
        return response()->json($this->getModel($request)::findOrFail($id));
    }
    
    
    public function getAll(Request $request)
    {
        $model = $this->getModel($request);
        foreach ($request->all() as $key => $value) {
                    $array_params = explode('.', $key);
                if (array_key_exists(1, $array_params)) {

                    $column = end($array_params);
                    $relation = str_replace(".".$column , "",$key);

                    $model = $model->with($relation);
                    $model = $model->whereHas($relation, function (Builder $query) use ($column, $value) {
                        return $query->where($column, '=', $value);
                    });

                } else {
                    $model = $model->where($key, $value);
                }
            }
            return response()->json($model->get());
    }

    public function edit(Request $request, $id)
    {
        $edit = $this->getModel($request)::findOrFail($id);
        $edit->update($this->getModel($request)->getValidate($request));
        return response()->json($edit);
    }

    public function delete($id)
    {
        $this->getModel($request)::findOrFail($id)->delete();
        return response()->json('Deleted', 204);
    }


    public function getInUseCabinet(Request $request)
    {
        $cabinet = Booking::where('cabinet_id', $request->id)->where('time_start',"like", '%'.$request->time.'%')->get();   
        return response()->json($cabinet);
    }

}
