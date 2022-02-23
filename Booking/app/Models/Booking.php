<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'cabinet_id', 'time_start','time_end'];

    protected $hidden = ['created_at','updated_at'];

    public function cabinet(){
        return  $this->belongsTo(Cabinet::class);
    }


    public function getPostValidate(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'cabinet_id' => 'required|integer',
            'time_start' =>  'required|date_format:Y-m-d H:i',
            'time_end' => 'required|date_format:Y-m-d H:i',
        ]);
        return $data;
    }
    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|required|integer',
            'cabinet_id' => 'sometimes|required|integer',
            'time_start' =>  'sometimes|required|date_format:Y-m-d H:i',
            'time_end' => 'sometimes|required|date_format:Y-m-d H:i',
        ]);
        return $data;
    }

}
