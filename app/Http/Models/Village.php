<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model 
{
    
    protected $table = 'villages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'district_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
