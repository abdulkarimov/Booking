<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    use HasFactory;

    public function country(){
        return  $this->belongsTo(Country::class);
    }

    protected $fillable = ['name' , 'country_id'];

    protected $hidden = ['created_at','updated_at'];

    public function getPostValidate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'country_id' => 'required|integer'
        ]);
        return $data;
    }
    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'country_id' => 'sometimes|required|integer'
        ]);
        return $data;
    }
}
