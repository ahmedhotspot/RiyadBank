<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile_phone' => $this->mobile_phone,
            'city_id' => $this->city_id,
            'marital_status' => $this->marital_status,
            'created_at' => $this->created_at->format('d M Y, H:i'),
            'updated_at' => $this->updated_at->format('d M Y, H:i'),
            'offers' => OfferResource::collection($this->whenLoaded('offers')),
            'offer_count' => $this->offers?->count(),


        ];
    }
}
