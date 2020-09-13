<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model 
{
    
    protected $table = 'merchants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'name',
        'phone',
        'email',
    ];

    protected $hidden = [
        'password'
    ];
}
