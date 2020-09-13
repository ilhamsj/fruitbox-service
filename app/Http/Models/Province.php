<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model 
{
    
    protected $table = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
