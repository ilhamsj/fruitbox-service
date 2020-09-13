<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model 
{
    
    protected $table = 'districts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
