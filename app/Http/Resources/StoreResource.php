<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id,' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'merchant_id' => $this->merchant,
            'village' => $this->village->name,
            'district' => $this->village->district->name,
            'city' => $this->village->district->city->name,
            'province' => $this->village->district->city->province->name,
            'country' => $this->village->district->city->province->country->name,
        ];
    }
}