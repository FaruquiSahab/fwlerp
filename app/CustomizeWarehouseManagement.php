<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomizeWarehouseManagement extends Model
{
    protected $guarded = [];
    protected $table = 'customize_warehouse_management';


    public function warehouse()
    {
    	return $this->belongsTo('App\WarehouseManagement','wm_id','wm_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product','p_id','p_id');
    }

    public function person()
    {
    	return $this->belongsTo('App\PersonalInfo','person_id','personal_info_personal_id');
    }

    public function head()
    {
    	return $this->belongsTo('App\Employee','head_id');
    }

    public function vehicle()
    {
    	return $this->belongsTo('App\VehicleManagement','vm_id','vehicle_management_ID');
    }

    public function distribution()
    {
    	return $this->belongsTo('App\DistributionManagement','dm_id','dm_id');
    }

}
