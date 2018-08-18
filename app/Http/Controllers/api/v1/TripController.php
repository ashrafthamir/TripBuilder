<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Trip;
use App\Http\Resources\TripResource;

class TripController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $trips = Trip::get();
        return TripResource::collection($trips);
    }

    /**
    * Display a listing of the resource with pagination.
    *
    * @return \Illuminate\Http\Response
    */
    public function getPaginated()
    {
        $trips = Trip::paginate(10);
        return TripResource::collection($trips);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        if($trip = Trip::find($id)) {
            return new TripResource($trip);
        }
        else {
            return response()->json(['message' => 'Airport not found!'],200);
        }
    }

    /**
    * Get trip flights.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function getTripFlights($id)
    {
        $trip_flights = Trip::find($id)->flights;
        return TripResource::collection($trip_flights);
    }
}
