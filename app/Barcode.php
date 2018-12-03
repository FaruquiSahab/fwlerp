<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    protected $guarded=[];
    protected $table= 'barcode';

    const status = 'Free';
}
