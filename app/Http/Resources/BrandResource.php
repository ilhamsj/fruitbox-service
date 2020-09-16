<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}