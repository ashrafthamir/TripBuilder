<?php

use Illuminate\Database\Seeder;
use App\Airline;

class AirlinesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        Airline::truncate();
        $airlines_json = json_decode(Storage::get('data_seed/airlines.json'),true);
        foreach($airlines_json as $airline) {
            Airline::create(array(
                'id' => $airline['id'],
                'name' => $airline['name'],
                'iata' => $airline['iata'],
                'icao' => $airline['icao'],
                'callsign' => $airline['callsign']
            ));
        }
    }
}
