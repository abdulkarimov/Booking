<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract  class CRUD_Controller  extends Controller
{
    abstract protected function getModel();

    public function add(Request $request)
    {
        $add = $this->getModel()::create($this->getModel()->getValidate($request));
        return response()->json($add);
    }

    public function getAll()
    {
        return response()->json(($this->getModel())::all());
    }

    public function getById($id)
    {
        return response()->json($this->getModel()::findOrFail($id));
    }

    public function edit(Request $request , $id)
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
