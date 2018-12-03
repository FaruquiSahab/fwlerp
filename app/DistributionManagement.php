<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributionManagement extends Model
{
    protected $guarded = [];
    protected $table ='distribution_management';

    public function distribution()
    {
    	return $this->belongsTo('App\Distribution','d_id','d_id');
    }

    public function head()
    {
    	return $this->belongsTo('App\PersonalInfo','head_id','personal_info_personal_id');
    }
}
