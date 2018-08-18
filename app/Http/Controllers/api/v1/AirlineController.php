<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airline;
use App\Http\Resources\AirlineResource;

class AirlineController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $airlines = Airline::get();
        return AirlineResource::collection($airlines);
    }
}
