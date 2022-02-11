<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'cabinet_id', 'time_start','time_end'];

    public function cabinet(){
        return  $this->belongsTo(Cabinet::class)->with(City::class);
    }
    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'cabinet_id' => 'required|integer',
            'time_start' =>  'required|date_format:Y-m-d H:i',
            'time_end' => 'required|date_format:Y-m-d H:i',
        ]);
        return $data;
    }


}
