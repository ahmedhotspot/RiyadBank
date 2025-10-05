<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockApiResponse extends Model
{
    use HasFactory;
    protected $fillable = ['key','http_status','body','description'];

    protected $casts = [
        'body' => 'array',
    ];
}
