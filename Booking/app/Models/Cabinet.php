<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;
    protected $fillable = ['number_cabinet', 'description', 'status','building_id' ];
    public function building(){
        return  $this->belongsTo(Building::class);
    }


}
