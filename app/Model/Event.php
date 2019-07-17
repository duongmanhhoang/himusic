<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'image',
        'title',
        'slug',
        'body',
        'start_at',
        'end_at',
        'address',
        'link',
        'organizer_name',
        'organizer_phone',
        'organizer_email',
    ];
}
