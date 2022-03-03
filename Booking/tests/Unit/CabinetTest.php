<?php

namespace Tests\Unit;
use App\Models\Cabinet;
use Tests\TestCase;

class CabinetTest extends TestCase
{
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_ColumOfCabinetTrue()
    {

        $colum  = Cabinet::all()->first();
        $this->assertArrayHasKey("number_cabinet", $colum->toArray());
    }



    public function test_columCabinetId()
    {
        $colum  = Cabinet::all()->first();
        $this->assertTrue(array_key_exists("id" , $colum->toArray()));
    }
    public function test_columFromCabinetWhichBuildingIdTrue()
    {
        $colum  = Cabinet::all()->first();
        $this->assertTrue(array_key_exists("building_id" , $colum->toArray()));
    }

    public function test_columFromBuildingWhichBuildingIdFalse()
    {
        $colum  = Cabinet::all()->first();
        $this->assertFalse(array_key_exists("BUildingId" , $colum->toArray()));
    }

    public function test_CabinetController()
    {
        $a = (new \App\Http\Controllers\CabinetController())->getAll(\request());
        $this->assertIsNotFloat($a);
    }



}
