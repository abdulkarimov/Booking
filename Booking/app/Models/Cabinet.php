<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cabinet extends Model
{
    use HasFactory;
    protected $fillable = ['number_cabinet', 'description', 'status','building_id' ];

    public function building(){
        return  $this->belongsTo(Building::class);
    }

    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'number_cabinet' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|boolean',
            'building_id' => 'sometimes|required|integer',
        ]);
        return $data;
    }

}
