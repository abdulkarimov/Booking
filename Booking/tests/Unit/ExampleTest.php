<?php

namespace Tests\Unit;
use Illuminate\Http\Request;
use App\Models\Country;
use Tests\TestCase;

class ExampleTest extends TestCase
{



    public function test_CountryController()
    {
        $a = (new \App\Http\Controllers\CountryController())->getAll(\request());
        $this->assertIsNotFloat($a);
    }



}
