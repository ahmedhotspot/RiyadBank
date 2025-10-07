<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CustomerResource;

class OfferResource extends JsonResource
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
            'offer_id' => $this->offer_id,
            'offerStatus' => $this->offerStatus,
            'customer' => new CustomerResource($this->customer),
            'loan_amount' => $this->loan_amount,
            'monthly_installment' => $this->monthly_installment,
            'finance_period' => $this->finance_period,
            'offer_validity' => $this->offer_validity,
            'profit_rate' => $this->profit_rate,
            'formatted_status' => $this->formatted_status,
            'created_at' => $this->created_at->format('d M Y, H:i'),

        ];
    }
}
