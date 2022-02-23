<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class CRUD_Controller extends Controller
{
    abstract protected function getModel();

    public function add(Request $request)
    {
        $add = $this->getModel()::create($this->getModel()->getPostValidate($request));
        return response()->json($add, 201);
    }

    public function getAll(Request $request)
    {
        $model = $this->getModel();
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
        $edit = $this->getModel()::findOrFail($id);
        $edit->update($this->getModel()->getValidate($request));
        return response()->json($edit);
    }

    public function delete($id)
    {
        $this->getModel()::findOrFail($id)->delete();
        return response()->json('Deleted', 204);
    }


}
