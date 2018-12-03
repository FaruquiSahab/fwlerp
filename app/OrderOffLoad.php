<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderOffLoad extends Model
{
	protected $table = 'order_off_load';
	protected $guarded = [];


	public function product()
	{
		return $this->belongsTo('App\Product','product_id','p_id');
	}

	public function customer()
	{
		return $this->belongsTo('App\Customer','customer_id','id');
	}

	public function inload()
	{
		return $this->belongsTo('App\OrderInLoad','inload_id','id');
	}
	public function consignee()
	{
		return $this->belongsTo('App\Consignee','consignee_id','id');
	}
}
