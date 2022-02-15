<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Building extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'lon','lat' , 'city_id'];

    public function city(){
        return  $this->belongsTo(City::class );
    }

    public function cabinets(){
        return  $this->hasMany(Cabinet::class );
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
