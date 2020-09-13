<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'unit',
        'quantity',
        'price',
        'price_total',
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
 }
