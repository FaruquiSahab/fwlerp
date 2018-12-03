<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempStorage extends Model
{
    protected $guarded = [];
    protected $table  = 'temporary_storage';

    public function warehouse()
    {
    	return $this->belongsTo('App\Warehouse','w_id');
    }
}
