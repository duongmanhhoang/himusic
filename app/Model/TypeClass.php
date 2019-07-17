<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeClass extends Model
{
    protected $fillable = [
        'image',
        'name',
        'slug',
        'description'
    ];

    public function getClass()
    {
        return $this->hasMany(Classes::class, 'type_class');
    }
}
