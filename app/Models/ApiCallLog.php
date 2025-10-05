<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiCallLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'operator_txn', 'x_request_id', 'method', 'path',
        'response_status', 'request_headers', 'request_body', 'response_body',
    ];

    protected $casts = [
        'request_headers' => 'array',
        'response_body' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (ApiCallLog $model) {
            if (empty($model->operator_txn)) {
                $model->operator_txn = self::makeOperatorTxn();
            }
        });
    }

    public static function makeOperatorTxn(): string
    {
        return 'RB-'.strtoupper((string) Str::ulid());
    }
}
