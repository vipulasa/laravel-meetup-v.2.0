<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'image'
    ];

    protected $hidden = [
        'created_date',
        'updated_at'
    ];


    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
