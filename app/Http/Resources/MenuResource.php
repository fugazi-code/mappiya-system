<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'selling_price' => $this->selling_price,
            'vendor_price' => $this->vendor_price,
            'image' => $this->image,
            'is_available' => $this->is_available,
        ];
    }
}
