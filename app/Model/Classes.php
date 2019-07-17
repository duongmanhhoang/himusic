<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'image',
        'name',
        'slug',
        'body',
        'description',
        'type_class',
    ];
}
