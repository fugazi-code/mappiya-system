<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    public $role = '';

    public function __construct($resource, $role)
    {
        $this->role = $role;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this::wrap(false);

        $parsed = ['message' => 'No Details'];

        if($this->role == 2) {
            $parsed = [
                "name" => $this->name,
                "address" => $this->address,
                "longitude" => $this->longitude,
                "latitude" => $this->latitude,
                "is_available" => $this->is_available,
                "is_blocked" => $this->is_blocked,
                "deleted_at" => $this->deleted_at,
                "role" => $this->role,
            ];
        }
        if($this->role == 3) {
            $parsed = [
                'phone_no'=> $this->phone_no,
                'address'=> $this->address,
                'plate_no'=> $this->plate_no,
                'vehicle_id'=> $this->vehicle_id,
                'profile_image'=> $this->profile_image,
                'is_blocked'=> $this->is_blocked,
                'is_active'=> $this->is_active,
            ];
        }
        if($this->role == 4) {
            $parsed = [
                'phone_no' => $this->phone_no,
                'address' => $this->address,
                'profile_image' => $this->profile_image,
                'is_blocked' => $this->is_blocked,
                'is_active' => $this->is_active,
            ];
        }

        return $parsed;
    }
}
