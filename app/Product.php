<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'menu_id',
        'title',
        'price',
        'image'
    ];

    protected $hidden = [
        'created_date',
        'updated_at'
    ];
}
