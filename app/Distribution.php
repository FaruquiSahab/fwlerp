<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $guarded = [];
    protected $table = 'distribution';

    public function product()
    {
    	return $this->belongsTo('App\Product','item','p_id');
    }

}
