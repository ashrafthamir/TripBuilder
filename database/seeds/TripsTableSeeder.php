<?php

use Illuminate\Database\Seeder;
use App\Trip;
use App\Airport;

class TripsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        Trip::truncate();
        $airports = Airport::pluck('id')->toArray();
        for($i = 0; $i < 100; $i++) {
            Trip::create(array(
                'from_airport' => $airports[array_rand($airports)],
                'to_airport' => $airports[array_rand($airports)]
            ));
        }
    }
}
