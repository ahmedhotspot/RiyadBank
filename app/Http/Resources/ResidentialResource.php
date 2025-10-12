<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResidentialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'langId' => $this->langId,
            'residentialRegion' => $this->residentialRegion,
            'residentialRegionCode' => $this->residentialRegionCode,
            'created_at' => $this->created_at? $this->created_at->timezone('Asia/Riyadh')->format('d M Y, h:i:s A')  : null,
            'updated_at' => $this->updated_at? $this->updated_at->timezone('Asia/Riyadh')->format('d M Y, h:i:s A')  : null,
        ];
    }
}
