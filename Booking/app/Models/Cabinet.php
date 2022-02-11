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
            'number_cabinet' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'building_id' => 'required|integer',
        ]);
        return $data;
    }

}
