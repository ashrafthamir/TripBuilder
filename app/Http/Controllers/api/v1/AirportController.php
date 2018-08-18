<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airport;
use App\Http\Resources\AirportResource;

class AirportController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $airports = Airport::orderby('name','asc')->get();
        return AirportResource::collection($airports);
    }

    /**
    * Display a listing of the resource with pagination.
    *
    * @return \Illuminate\Http\Response
    */
    public function getPaginated()
    {
        $airports = Airport::orderby('name','asc')->paginate(10);
        return AirportResource::collection($airports);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        if($airport = Airport::find($id)) {
            return new AirportResource($airport);
        }
        else {
            return response()->json(['message' => 'Airport not found!'],200);
        }
    }
}
