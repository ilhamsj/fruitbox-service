<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model 
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
