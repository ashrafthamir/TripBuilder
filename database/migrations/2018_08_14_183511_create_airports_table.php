<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('city',100);
            $table->string('country',100);
            $table->char('iata',3);
            $table->char('icao',4);
            $table->float('latitude',30,20);
            $table->float('longitude',30,20);
            $table->integer('altitude');
            $table->float('timezone',4,2);
            $table->string('dst',5);
            $table->string('tz',100);
            $table->timestamps();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('airports');
    }
}
