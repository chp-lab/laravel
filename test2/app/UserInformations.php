<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformations extends Model
{
    protected $fillable=['username', 'password', 'industry_type', 'factory_name', 'address', 'contact_info'];
}
