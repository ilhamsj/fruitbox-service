<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'quantity' => $this->quantity,
            'store' => new StoreResource($this->store),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}