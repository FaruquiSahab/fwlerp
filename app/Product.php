<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Milon\Barcode\DNS1D;

class Product extends Model
{
    protected $guarded = [];
    protected $table = 'product';
    protected $primaryKey = 'p_id';


}
