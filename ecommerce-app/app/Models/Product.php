<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'val',
        'explanation',
        'picture',
        'genre',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
