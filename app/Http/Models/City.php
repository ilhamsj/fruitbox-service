<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{
    
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'province_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
    
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
