<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function getValidationRules() {
        return [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ];
    }

    public function updateData($request, $id) {
        $data = $this->find($id);
        return $data ? $data->update($request->all()) : false;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
 }
