<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_statuses';

    protected $fillable = [
        'name',
        'type',
    ];

    public function getValidationRules() {
        return [
            'name' => 'required',
            'type' => 'required',
        ];
    }

    public function updateData($request, $id) {
        $data = $this->find($id);
        return $data ? $data->update($request->all()) : false;
    }
 }
