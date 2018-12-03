<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];
    protected $table = 'location';
    protected $primaryKey = 'location_ID';
}
