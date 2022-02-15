<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class City extends Model
{
    use HasFactory;

    public function country(){
        return  $this->belongsTo(Country::class);
    }

    public function buildings()
    {
            return $this->hasMany(Building::class);
    }

    protected $fillable = ['name' , 'country_id'];

    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'country_id' => 'sometimes|required|integer'
        ]);
        return $data;
    }

}
