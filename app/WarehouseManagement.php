<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseManagement extends Model
{
    protected $guarded = [];
    protected $table = 'warehouse_management';
    protected $primaryKey = 'wm_id';


    
    public function employee()
    {
    	return $this->belongsTo('App\Employee','sales_person_id');
    }
    public function client()
    {
    	return $this->belongsTo('App\Client','client_id');
    }
    
    public function warehouse()
    {
          return $this->belongsTo('App\Warehouse','w_id','w_id');
    }
    
    public function company()
    {
          return $this->belongsTo('App\ClientCompany','company_id','company_id');
    }
}
