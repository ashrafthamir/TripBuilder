<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function trip()
    {
        return $this->belongsTo(Trip::Class);
    }
}
