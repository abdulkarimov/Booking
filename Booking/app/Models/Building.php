<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class Building extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'lon','lat' , 'city_id'];

    public function city(){
        return  $this->belongsTo(City::class );
    }


}
