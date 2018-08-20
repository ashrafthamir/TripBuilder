<?php

use Illuminate\Database\Seeder;
use App\Flight;
use App\Airline;
use App\Trip;

class FlightsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        Flight::truncate();
        $airlines = Airline::pluck('id')->toArray();
        $trips = Trip::pluck('id')->toArray();
        for($i = 0; $i < 200; $i++) {
            $airline_id = $airlines[array_rand($airlines)];
            $airline_ICAO = Airline::find($airline_id)->icao;
            $flight_number = $airline_ICAO.rand(100,999);
            Flight::create(array(
                'flight_number' => $flight_number,
                'trip_id' => $trips[array_rand($trips)],
                'airline_id' => $airline_id
            ));
        }
    }
}
