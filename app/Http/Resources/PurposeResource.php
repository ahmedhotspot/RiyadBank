<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurposeResource extends JsonResource
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
            'value' => $this->value,
            'description' => $this->description,
            'created_at' => $this->created_at? $this->created_at->timezone('Asia/Riyadh')->format('d M Y, h:i:s A')  : null,
            'updated_at' => $this->updated_at? $this->updated_at->timezone('Asia/Riyadh')->format('d M Y, h:i:s A')  : null,
        ];
    }
}
