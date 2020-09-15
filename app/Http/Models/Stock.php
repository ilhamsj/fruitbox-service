<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = [
        'product_id',
        'store_id',
        'quantity',
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

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
 }
