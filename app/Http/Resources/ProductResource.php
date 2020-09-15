<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'unit' => $this->unit,
            'brand' => $this->brand,
            'category' => $this->category,
            'stocks' => StockResource::collection($this->stocks),
            'stocks_total' => $this->stockTotal(),
        ];
    }
}