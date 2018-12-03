<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCompany extends Model
{
    protected $guarded = [];
    protected $table = 'client_company';
    protected $primaryKey = 'company_id';
}
