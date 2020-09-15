<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'description',
        'price',
        'unit',
    ];

    public function getValidationRules() {
        return [
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required|min:10|max:100',
            'description' => 'required|min:30',
            'price' => 'required|integer',
            'unit' => 'required|string',
        ];
    }

    public function updateData($request, $id) {
        $data = $this->find($id);
        return $data ? $data->update($request->all()) : false;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'product_id');
    }

    public function stockTotal()
    {
        $total = 0;
        foreach ($this->stocks as $key => $value) {
            $total = $value->quantity + $total;
        }
        return $total ? $total : 'Kosong';
    }
 }
