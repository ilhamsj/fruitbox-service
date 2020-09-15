<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'merchant_id',
        'village_id',
        'name',
        'address',
    ];

    public function getValidationRules() {
        return [
            'title' => 'required|min:10',
            'description' => 'required|min:15',
        ];
    }

    public function updateData($request, $id) {
        $data = $this->find($id);
        return $data ? $data->update($request->all()) : false;
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
 }
