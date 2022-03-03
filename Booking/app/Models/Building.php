<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Building extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'lon','lat' , 'city_id'];

    protected $hidden = ['created_at', 'updated_at'];


    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function getPostValidate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'lon' => 'required|string',
            'lat' => 'required|string',
            'city_id' =>  'required|integer',
        ]);
        return $data;
    }
    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'address' => 'sometimes|required|string',
            'lon' => 'sometimes|required|string',
            'lat' => 'sometimes|required|string',
            'city_id' =>  'sometimes|required|integer',
        ]);
        return $data;
    }
}
