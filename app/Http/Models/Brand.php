<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = [
        'name',
        'description',
        'logo',
    ];

    public function getValidationRules() {
        return [
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required',
        ];
    }

    public function updateData($request, $id) {
        $data = $this->find($id);
        return $data ? $data->update($request->all()) : false;
    }
 }
