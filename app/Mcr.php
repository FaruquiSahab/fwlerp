<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcr extends Model
{
    protected $guarded = [];
    protected $table = 'mcr';
    protected $primaryKey = 'mcr_id';

    public function vehicle()
    {
    	return $this->belongsTo('App\Vehicle','mcr_vehicle','vehicle_ID');
    }

    public function vendor($value='')
    {
    	return $this->belongsTo('App\Customer','mcr_vendor');
    }
}
