<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
      protected $fillable = [
        'source','name','id_information','education_level','marital_status','date_of_birth',
        'mobile_phone','email','city_id','post_code','dependents',
        'food_expense','housing_expense','utilities','insurance','healthcare_service',
        'transportation_expense','education_expense','domestic_help','future_expense',
        'mps','total_expenses',
        'secondary_income_type','secondary_income_amount','secondary_income_frequency',
        'purpose_of_loan','home_ownership','residential_type',
        'pii_encrypted',
    ];

    // تشفير تلقائي لحقول حساسة
    protected $casts = [
        'date_of_birth'  => 'date',
        'pii_encrypted'  => 'boolean',
    ];

    protected $appends = [
        'marital_status_color',
        'source_text',
        'source_badge'
    ];

    public function alias()
    {
        return $this->hasOne(CustomerAlias::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    /**
     * Get the marital status color for badge display
     */
    public function getMaritalStatusColorAttribute()
    {
        return self::getMaritalStatusColors()[$this->marital_status] ?? 'primary';
    }

    /**
     * Get all marital status colors (static method for use in views)
     */
    public static function getMaritalStatusColors()
    {
        return [
            'Single' => 'primary',
            'Married' => 'success',
            'Divorced' => 'warning',
            'Widowed' => 'dark'
        ];
    }



    // filter scope
    public function scopeFilter($query, $request)
    {
        if($request->has('search')){
            $query->where('email', 'like', '%'.$request->search.'%')
                  ->orWhere('mobile_phone', 'like', '%'.$request->search.'%')
                  ->orWhere('id_information', 'like', '%'.$request->search.'%')
                  ->orWhere('name', 'like', '%'.$request->search.'%');
        }

        if($request->has('city_id')){
            $query->where('city_id', $request->city_id);
        }
        if($request->has('marital_status')){
            $query->where('marital_status', $request->marital_status);
        }
        if($request->has('source')){
            $query->where('source', $request->source);
        }
        if($request->has('created_at')){
            $query->whereDate('created_at', $request->created_at);
        }
        if($request->has('email')){
            $query->where('email', 'like', '%'.$request->email.'%');
        }
        if($request->has('mobile_phone')){
            $query->where('mobile_phone', 'like', '%'.$request->mobile_phone.'%');
        }



        return $query;
    }

    // Accessor لنص المصدر
    public function getSourceTextAttribute()
    {
        return $this->source === 'app' ? __('dashboard.mobile_app') : __('dashboard.web_system');
    }

    // Accessor لشارة المصدر مع الألوان
    public function getSourceBadgeAttribute()
    {
        if ($this->source === 'app') {
            return '<span class="badge badge-light-primary">' . __('dashboard.mobile_app') . '</span>';
        } else {
            return '<span class="badge badge-light-info">' . __('dashboard.web_system') . '</span>';
        }
    }
}
