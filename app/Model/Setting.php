<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'web_setting';
    public $timestamps = false;
    protected $fillable =
        [
            'logo',
            'background',
            'email',
            'phone',
            'address',
            'websites',
            'facebook',
            'instagram',
            'pinterest',
            'twitter',
        ];
}
