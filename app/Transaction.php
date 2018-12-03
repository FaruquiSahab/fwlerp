<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $guarded = [];
    protected $primaryKey = 't_id';


    public function client()
    {
        try
        {
            return $this->belongsTo('App\ClientCompany','client_company_id','company_id');
        }
        catch (\Exception $e)
        {
            return null;
        }
    	
    }

    //vehicle managment
    public function vehicle()
    {
    	return $this->belongsTo('App\VehicleManagement','vehicle_managment_id','vehicle_management_ID');
    }

    public function warehouse()
    {
    	return $this->belongsTo('App\WarehouseManagement','warehouse_management_id','wm_id');
    }

    public function distribution()
    {
    	return $this->belongsTo('App\Distribution','distribution_id','d_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\PersonalInfo','personal_info_id','personal_info_personal_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product','product_id','p_id');
    }

}
