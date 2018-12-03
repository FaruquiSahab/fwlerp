<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderInLoad extends Model
{
    protected $table = 'order_in_load';
    protected $guarded = [];


  public function product()
  {
  	return $this->belongsTo('App\Product','product_id','p_id');
  }

  public function customer()
  {
  	return $this->belongsTo('App\Customer','customer_id','id');
  }

  public function warehouse()
  {
    return $this->belongsTo('App\Warehouse','w_id','w_id');
  }
}
