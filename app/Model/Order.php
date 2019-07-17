<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'receiver_address',
        'info',
        'note',
        'status'
    ];
}
