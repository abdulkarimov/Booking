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
    public function getValidate(Request $request)
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

}
