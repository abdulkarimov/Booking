<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cabinet extends Model
{
    use HasFactory;
    protected $fillable = ['number_cabinet', 'description', 'status','building_id' ];

    protected $hidden = ['created_at','updated_at'];

    public function building(){
        return  $this->belongsTo(Building::class  );
    }



    public function getPostValidate(Request $request)
    {
        $data = $request->validate([
            'number_cabinet' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'building_id' => 'required|integer'
        ]);
        return $data;
    }

    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'number_cabinet' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|boolean',
            'building_id' => 'sometimes|required|integer'
        ]);
        return $data;
    }

}
