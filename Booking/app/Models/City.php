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
    protected $fillable = ['name' , 'country_id'];

    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'country_id' => 'required|integer'
        ]);
        return $data;
    }

}
