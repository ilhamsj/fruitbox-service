<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model 
{
    
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'iso3',
        'iso2',
        'phone_code',
        'capital',
        'currency'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function getByName($name)
    {
        return $this->where('name', $name)->firstOrFail();
    }

    public function getByCode($code)
    {
        return $this->where('iso2', $code)->firstOrFail();
    }

    public function states()
    {
        return $this->hasMany(Province::class, 'country_id','id')->orderBy('name','asc');
    }

    public function getStateByCountryName($name)
    {
        $country = $this->where('name', $name)->firstOrFail();

        return $country->states;
    }
}
