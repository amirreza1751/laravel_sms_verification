<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumberToken extends Model
{
    protected $table = 'phonenumber_token';

    protected $fillable = [
        'phone_number',
        'token',
        'used'
    ];
}
