<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'offer_id',
        'offerStatus',
        'response',
    ];

    protected $casts = [
        'response' => 'array',
    ];

    protected $appends = [
        'status_color',
        'status_text',
        'formatted_status',
        'loan_amount',
        'loan_duration',
        'monthly_installment',
        'finance_period',
        'profit_rate',
        'short_offer_id',
        'is_active'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Get the status color for badge display
     */
    public function getStatusColorAttribute()
    {
        return self::getStatusColors()[$this->offerStatus] ?? 'secondary';
    }

    /**
     * Get the status text for display
     */
    public function getStatusTextAttribute()
    {
        return self::getStatusNames()[$this->offerStatus] ?? $this->offerStatus;
    }

    /**
     * Get all status names (static method for use in views)
     */
    public static function getStatusNames()
    {
        return [
            'FINAL_OFFER_GENERATED' => 'Final Offer',
            'OFFER_PENDING' => 'Pending',
            'OFFER_APPROVED' => 'Approved',
            'OFFER_REJECTED' => 'Rejected',
            'OFFER_EXPIRED' => 'Expired'
        ];
    }

    /**
     * Get all status colors (static method for use in views)
     */
    public static function getStatusColors()
    {
        return [
            'FINAL_OFFER_GENERATED' => 'success',
            'OFFER_PENDING' => 'warning',
            'OFFER_APPROVED' => 'primary',
            'OFFER_REJECTED' => 'danger',
            'OFFER_EXPIRED' => 'dark'
        ];
    }

    /**
     * Get formatted status text
     */
    public function getFormattedStatusAttribute()
    {
        return str_replace('_', ' ', $this->offerStatus);
    }

    /**
     * Get loan amount from response
     */
    public function getLoanAmountAttribute()
    {
        return $this->response['updateOffer']['loanAmount'] ?? 0;
    }

    /**
     * Get loan duration from response
     */
    public function getLoanDurationAttribute()
    {
        return $this->response['updateOffer']['financePeriodInMonths'] ?? 0;
    }

    /**
     * Get monthly installment from response
     */
    public function getMonthlyInstallmentAttribute()
    {
        return $this->response['updateOffer']['monthlyInstallment'] ?? 0;
    }

    /**
     * Get finance period from response
     */
    public function getFinancePeriodAttribute()
    {
        return $this->response['updateOffer']['financePeriodInMonths'] ?? 0;
    }

    /**
     * Get profit rate from response
     */
    public function getProfitRateAttribute()
    {
        return $this->response['updateOffer']['profitRate'] ?? 0;
    }

    /**
     * Get short offer ID (last 4 characters)
     */
    public function getShortOfferIdAttribute()
    {
        return substr($this->offer_id, -4);
    }

    /**
     * Check if offer is active/valid
     */
    public function getIsActiveAttribute()
    {
        return in_array($this->offerStatus, ['FINAL_OFFER_GENERATED', 'OFFER_PENDING', 'OFFER_APPROVED']);
    }

    /**
     * Filter scope for offers
     */
    public function scopeFilter($query, $request)
    {
        if($request->has('search') && !empty($request->search)){
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('offer_id', 'like', '%'.$searchTerm.'%')
                  ->orWhereHas('customer', function($customerQuery) use ($searchTerm) {
                      $customerQuery->where('name', 'like', '%'.$searchTerm.'%')
                                   ->orWhere('email', 'like', '%'.$searchTerm.'%')
                                   ->orWhere('mobile_phone', 'like', '%'.$searchTerm.'%');
                  });
            });
        }

        if($request->has('offer_status') && !empty($request->offer_status)){
            $query->where('offerStatus', $request->offer_status);
        }

        if($request->has('customer_id') && !empty($request->customer_id)){
            $query->where('customer_id', $request->customer_id);
        }

        if($request->has('created_at') && !empty($request->created_at)){
            $query->whereDate('created_at', $request->created_at);
        }

        if($request->has('loan_amount_min') && !empty($request->loan_amount_min)){
            $query->whereJsonContains('response->updateOffer->loanAmount', '>=', (int)$request->loan_amount_min);
        }

        if($request->has('loan_amount_max') && !empty($request->loan_amount_max)){
            $query->whereJsonContains('response->updateOffer->loanAmount', '<=', (int)$request->loan_amount_max);
        }

        return $query;
    }
}
