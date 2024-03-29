<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'parent_id',
        'type',
        'name',
        'slug',
        'image'
    ];
}
