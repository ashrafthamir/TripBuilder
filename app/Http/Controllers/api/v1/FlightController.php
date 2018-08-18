<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;
use App\Airline;
use App\Http\Resources\FlightResource;
use Validator;

class FlightController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $flights = Flight::get();
        return FlightResource::collection($flights);
    }

    /**
    * Display a listing of the resource with pagination.
    *
    * @return \Illuminate\Http\Response
    */
    public function getPaginated()
    {
        $flights = Flight::paginate(10);
        return FlightResource::collection($flights);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // validate the input
        $validator = Validator::make($request->all(), [
            'trip_id' => 'required|numeric|max:10000',
            'airline_id' => 'required|numeric|max:10000'
        ]);

        // return error if validator fails
        if($validator->fails())
        return response()->json(['errors' => $validator->errors()->all()],422);

        // generate flight number from airline ICAO and random number
        $airline = Airline::find($request->airline_id);
        $flight_number = $airline->icao.rand(100,999);

        // storing new flight
        $flight = new Flight();
        $flight->trip_id = $request->trip_id;
        $flight->airline_id = $request->airline_id;
        $flight->flight_number = $flight_number;
        $flight->save();

        return response()->json(['message' => 'Successfully Stored!'],200);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $flight = Flight::find($id);
        $flight->delete();
        return response()->json(['message' => 'Successfully Deleted!'],200);
    }
}
