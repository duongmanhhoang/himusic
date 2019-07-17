<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable =
        [
            'image',
            'cate_id',
            'name',
            'slug',
            'description',
            'price',
            'sale_price',
            'sale_status',
            'meta_title',
            'meta_description',
            'meta_keywords'
        ];
}
