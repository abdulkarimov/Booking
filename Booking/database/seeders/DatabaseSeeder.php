<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Building;
use App\Models\Cabinet;
use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()
            ->count(20)
            ->create();

        City::factory()
           ->count(20)
           ->create();

        Building::factory()
            ->count(20)
            ->create();

        Cabinet::factory()
            ->count(20)
            ->create();

        Booking::factory()
            ->count(20)
            ->create();




//        DB::table('countries')->insert([
//            'name' => Str::random(10),
//        ]);
//
//
//
//        DB::table('cities')->insert([
//            'name' => Str::random(10),
//            'country_id'=> Country::all()->random()->id,
//        ]);
//
//
//        DB::table('buildings')->insert([
//            "name" =>  "it-step",
//            "address" =>  "auezova",
//            "lon" =>  "123",
//            "lat" =>  "321",
//            "city_id" =>  City::all()->random()->id,
//        ]);
//
//        DB::table('cabinets')->insert([
//            "number_cabinet" => "217",
//            "description" => "programmers",
//            "status" => true,
//            "building_id"=> Building::all()->random()->id,
//
//        ]);
//
//
//        DB::table('bookings')->insert([
//            "user_id"=> 1,
//            "cabinet_id"=> Cabinet::all()->random()->id,
//            "time_start"=> "2022-02-14 20:42",
//            "time_end"=> "2022-02-14 19:42",
//        ]);




    }
}
