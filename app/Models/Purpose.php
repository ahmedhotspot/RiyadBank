<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Purpose extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'value',
        'description',
    ];


    public  $translatable = ['description'];


    
}
