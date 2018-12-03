<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
	//table name
    protected $table = 'warehouses';
    // no need of doing fillable
    protected $guarded = [];
    // defining primary key
    protected $primaryKey = 'w_id';


    public function employee()
    {
    	return $this->belongsTo('App\Employee','user_id');
    }

    public function loaction()
    {
        return $this->belongsTo('App\Location','location','location_ID');
    }
}
