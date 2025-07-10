<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Disable timestamps since the table doesn't have created_at/updated_at
    public $timestamps = false;
    
    protected $fillable = [
        'product_id',
        'user_id',
        'cart_at',
    ];

    protected $casts = [
        'cart_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
