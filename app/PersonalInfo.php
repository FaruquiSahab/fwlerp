<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class PersonalInfo extends Authenticatable
{
    protected $guarded = [];
    protected $guard  = 'personal_info';
    protected $table = 'personal_info';
    protected $primaryKey = 'personal_info_personal_id';
}
