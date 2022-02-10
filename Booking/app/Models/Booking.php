<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'cabinet_id', 'time_start','time_end'];

    public function cabinet(){
        return  $this->belongsTo(Cabinet::class)->with(City::class);
    }


}
