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


    public function getByArgms($a, $b)
    {
        $data = DB::table('buildings')
            ->join('cities', 'buildings.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->where($a, '=', $b)
            ->select('buildings.*', 'countries', 'cities')->get();
        return $data;
    }



}
