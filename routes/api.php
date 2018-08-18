<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'v1','namespace'=>'\api\v1'],function (){

    Route::get('airlines', 'AirlineController@index');

    Route::group(['prefix'=>'airports'],function (){
        Route::get('/', 'AirportController@index');
        Route::get('/{airport_id}', 'AirportController@show');
    });

    Route::group(['prefix'=>'trips'],function (){
        Route::get('/', 'TripController@index');
        Route::get('/{trip_id}', 'TripController@show');
        Route::get('/{trip_id}/flights', 'TripController@getTripFlights');
    });

    Route::group(['prefix'=>'flights'],function (){
        Route::get('/', 'FlightController@index');
        Route::post('/', 'FlightController@store');
        Route::delete('/{flight_id}', 'FlightController@destroy');
        //Route::get('trip_airports/{trip_id}/{direction}', 'FlightController@getTripAirports');
    });

    // Get paginated responses
    Route::group(['prefix'=>'paginated'],function (){
        Route::get('airports', 'AirportController@getPaginated');
        Route::get('trips', 'TripController@getPaginated');
        Route::get('flights', 'FlightController@getPaginated');
    });

});
