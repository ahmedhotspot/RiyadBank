<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
      protected $fillable = [
        'id_information','education_level','marital_status','date_of_birth',
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
        'id_information' => 'encrypted',
        'date_of_birth'  => 'date',
        'mobile_phone'   => 'encrypted',
        'email'          => 'encrypted',
        'pii_encrypted'  => 'boolean',
    ];

    public function alias()
    {
        return $this->hasOne(CustomerAlias::class);
    }
}
