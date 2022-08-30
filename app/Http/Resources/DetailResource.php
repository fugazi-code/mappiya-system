<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this::wrap(false);
        
        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
            "is_available" => $this->is_available,
            "is_blocked" => $this->is_blocked,
            "deleted_at" => $this->deleted_at,
        ];
    }
}
