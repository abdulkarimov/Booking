<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract  class CRUD_Controller  extends Controller
{
    abstract protected function getModel();

    public function add(Request $request)
    {
        $add = $this->getModel()::create($this->getModel()->getValidate($request));
        return response()->json($add , 201);
    }

    public function getAll(Request $request)
    {
        if($request->getContent())
        {
            $foo = False;
            $data = null;
            $dates = null;


            foreach($request as $val)
            {

                foreach($val as $key=>$value)
                {
                    if($key == 'DOCUMENT_ROOT')
                    {
                        $foo = True;
                        break;
                    }

                    if (!$data)
                    {
                        $data = $this->getModel()->getByArgms($key, $value);
                        $dates = $data;
                    }
                    else {
                            $str = null;
                            $f = False;

                        foreach ($data as $i)
                                $str[] = $i->$key;

                        for ($i = 0; $i < count($str); $i++)
                        {
                            $pos = strripos($str[$i], $value);
                            if($pos != null)
                            {
                                $dates = $data[$i];
                                $f = True;
                            }
                            if(!$f)$dates = null;
                        }
                    }
                }
                if ($foo)
                    break;
            }
            //todo paginate
         return response()->json($dates);
        }
        else
            return response()->json(($this->getModel())::all());
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



    //    public function validate(Request $request)
//    {
//        $data = $request->validate([
//            'name' => 'sometimes|required|string',
//            'number_cabinet' => 'sometimes|required|string',
//            'description' => 'sometimes|required|string',
//            'status' => 'sometimes|required|boolean',
//            'address' => 'sometimes|required|string',
//            'lon' => 'sometimes|required|string',
//            'lat' => 'sometimes|required|string',
//            'time_start' =>  'sometimes|required|date_format:Y-m-d H:i',
//            'time_end' => 'sometimes|required|date_format:Y-m-d H:i',
//            'user_id' => 'sometimes|required|integer',
//            'cabinet_id' => 'sometimes|required|integer',
//            'city_id' =>  'sometimes|required|integer',
//            'building_id' => 'sometimes|required|integer',
//            'country_id' => 'sometimes|required|integer',
//            'id' => 'sometimes|required|integer',
//
//        ]);
//        return $data;
//    }

}
