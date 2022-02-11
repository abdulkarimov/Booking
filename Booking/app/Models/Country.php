<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function getValidate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        return $data;
    }
}
