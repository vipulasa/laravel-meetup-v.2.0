<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'qty'
    ];

    protected $hidden = [
        'created_date',
        'updated_at'
    ];
}
