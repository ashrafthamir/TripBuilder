<?php

use Illuminate\Database\Seeder;
use App\Airport;

class AirportsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        Airport::truncate();
        $airports_json = json_decode(Storage::get('data_seed/airports.json'),true);
        foreach($airports_json as $airport) {
            Airport::create(array(
                'id' => $airport['id'],
                'name' => $airport['name'],
                'city' => $airport['city'],
                'country' => $airport['country'],
                'iata' => $airport['iata'],
                'icao' => $airport['icao'],
                'latitude' => $airport['latitude'],
                'longitude' => $airport['longitude'],
                'altitude' => $airport['altitude'],
                'timezone' => $airport['timezone'],
                'dst' => $airport['dst'],
                'tz' => $airport['tz']
            ));
        }
    }
}
