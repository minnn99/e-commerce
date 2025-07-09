<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The name of the "created at" column.
     */
    const CREATED_AT = 'crated_at';

    protected $fillable = [
        'name',
        'email',
        'tel',
        'post',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
