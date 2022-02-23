<?php

namespace Tests\Unit;
use App\Models\Building;
use Tests\TestCase;

class BuildingTest extends TestCase
{
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_ColumOfBuilding()
    {

        $colum  = Building::all()->first();
        $this->assertArrayHasKey("name", $colum->toArray());
    }

    public function test_ColumOfBuildingFalse()
    {
        $colum  = Building::all()->first();
        $this->assertFalse(array_key_exists("names" , $colum->toArray()));
    }

    public function test_columBuildingIdFalse()
    {
        $colum  = Building::all()->first();
        $this->assertFalse(array_key_exists("IDD" , $colum->toArray()));
    }
    public function test_columBuildingId()
    {
        $colum  = Building::all()->first();
        $this->assertTrue(array_key_exists("id" , $colum->toArray()));
    }
    public function test_columFromBuildingWhichCabinetIdTrue()
    {
        $colum  = Building::all()->first();
        $this->assertTrue(array_key_exists("city_id" , $colum->toArray()));
    }

    public function test_columFromBuildingWhichCabinetIdFalse()
    {
        $colum  = Building::all()->first();
        $this->assertFalse(array_key_exists("City_id" , $colum->toArray()));
    }
    public function test_qwerty()
    {
        $a = (new \App\Http\Controllers\BuildingController())->getAll(\request());
        $this->assertIsNotFloat($a);
    }


}
