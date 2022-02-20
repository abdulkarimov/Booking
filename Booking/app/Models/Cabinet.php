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
        return  $this->belongsTo(Building::class);
    }

    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'number_cabinet' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'building_id' => 'required|integer'
        ]);
        return $data;
    }

    public function getByArgms($a, $b)
    {
        $data = DB::table('cabinets')
            ->join('buildings', 'cabinets.building_id', '=', 'buildings.id')
            ->join('cities', 'buildings.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->where($a, '=', $b)
            ->select('cabinets.*', 'buildings','cities' , 'countries')->get();
        return $data;
    }

}
