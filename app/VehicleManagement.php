<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleManagement extends Model
{
    protected $table = 'vehicle_management';
    protected $guarded = [];


    public function vehicle()
    {
    	return $this->belongsTo('App\Vehicle','vehicle_id','vehicle_ID');
    }


    public function driver()
    {
    	return $this->belongsTo('App\PersonalInfo','vehicle_management_driver_id','personal_info_personal_id');
    }
}
