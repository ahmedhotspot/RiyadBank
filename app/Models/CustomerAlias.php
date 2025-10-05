<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAlias extends Model
{
    use HasFactory;
     protected $fillable = [
        'customer_id','alias_id_number',
        'fake_full_name','fake_email','fake_mobile','fake_date_of_birth',
    ];

    public function customer()
    {
       return $this->belongsTo(Customer::class,'customer_id');
    }
}
