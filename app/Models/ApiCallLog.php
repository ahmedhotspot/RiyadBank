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

    /**
     * Get status color based on HTTP status code
     */
    public function getStatusColorAttribute()
    {
        if ($this->response_status >= 200 && $this->response_status < 300) {
            return 'success';
        } elseif ($this->response_status >= 300 && $this->response_status < 400) {
            return 'warning';
        } elseif ($this->response_status >= 400 && $this->response_status < 500) {
            return 'danger';
        } elseif ($this->response_status >= 500) {
            return 'dark';
        }

        return 'secondary';
    }

    /**
     * Get status text based on HTTP status code
     */
    public function getStatusTextAttribute()
    {
        $statusTexts = [
            200 => 'OK',
            201 => 'Created',
            204 => 'No Content',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            422 => 'Unprocessable Entity',
            500 => 'Internal Server Error',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
        ];

        return $statusTexts[$this->response_status] ?? 'Unknown';
    }

    /**
     * Get formatted method with color
     */
    public function getMethodColorAttribute()
    {
        $colors = [
            'GET' => 'primary',
            'POST' => 'success',
            'PUT' => 'warning',
            'PATCH' => 'info',
            'DELETE' => 'danger',
        ];

        return $colors[$this->method] ?? 'secondary';
    }

    /**
     * Get short operator transaction ID
     */
    public function getShortOperatorTxnAttribute()
    {
        return Str::limit($this->operator_txn, 15, '...');
    }

    /**
     * Get formatted request body
     */
    public function getFormattedRequestBodyAttribute()
    {
        if (empty($this->request_body)) {
            return null;
        }

        $decoded = json_decode($this->request_body, true);
        return $decoded ? json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : $this->request_body;
    }

    /**
     * Get formatted response body
     */
    public function getFormattedResponseBodyAttribute()
    {
        if (empty($this->response_body)) {
            return null;
        }

        // response_body is already an array due to JSON casting
        if (is_array($this->response_body)) {
            return json_encode($this->response_body, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        // If it's a string, try to decode and re-encode
        $decoded = json_decode($this->response_body, true);
        return $decoded ? json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : $this->response_body;
    }

    /**
     * Get statistics for logs
     */
    public static function getStats()
    {
        $totalLogs = static::count();
        $successfulCalls = static::successful()->count();
        $errorCalls = static::errors()->count();
        $todayLogs = static::today()->count();

        return [
            'total_logs' => $totalLogs,
            'successful_calls' => $successfulCalls,
            'error_calls' => $errorCalls,
            'today_logs' => $todayLogs,
            'success_rate' => $totalLogs > 0 ? round(($successfulCalls / $totalLogs) * 100, 2) : 0,
        ];
    }

    /**
     * Get detailed statistics with time periods
     */
    public static function getDetailedStats()
    {
        return [
            'total' => static::count(),
            'successful' => static::successful()->count(),
            'errors' => static::errors()->count(),
            'today' => static::today()->count(),
            'this_week' => static::thisWeek()->count(),
            'this_month' => static::thisMonth()->count(),
            'success_rate' => static::getSuccessRate(),
            'methods_breakdown' => static::getMethodsBreakdown(),
            'status_breakdown' => static::getStatusBreakdown(),
        ];
    }

    /**
     * Get success rate percentage
     */
    public static function getSuccessRate()
    {
        $total = static::count();
        if ($total === 0) {
            return 0;
        }

        $successful = static::successful()->count();
        return round(($successful / $total) * 100, 2);
    }

    /**
     * Get breakdown by HTTP methods
     */
    public static function getMethodsBreakdown()
    {
        return static::selectRaw('method, COUNT(*) as count')
                    ->groupBy('method')
                    ->pluck('count', 'method')
                    ->toArray();
    }

    /**
     * Get breakdown by status codes
     */
    public static function getStatusBreakdown()
    {
        return static::selectRaw('response_status, COUNT(*) as count')
                    ->groupBy('response_status')
                    ->orderBy('response_status')
                    ->pluck('count', 'response_status')
                    ->toArray();
    }

    /**
     * Get available methods for filter
     */
    public static function getAvailableMethods()
    {
        return static::distinct()->pluck('method')->filter()->values();
    }

    /**
     * Get available status codes for filter
     */
    public static function getAvailableStatusCodes()
    {
        return static::distinct()->pluck('response_status')->filter()->sort()->values();
    }

    /**
     * Get total logs count
     */
    public static function getTotalLogsCount()
    {
        return static::count();
    }

    /**
     * Get successful calls count
     */
    public static function getSuccessfulCallsCount()
    {
        return static::successful()->count();
    }

    /**
     * Get error calls count
     */
    public static function getErrorCallsCount()
    {
        return static::errors()->count();
    }

    /**
     * Get today's logs count
     */
    public static function getTodayLogsCount()
    {
        return static::today()->count();
    }

    /**
     * Scope: Search in operator_txn, x_request_id, method, and path
     */
    public function scopeSearch($query, $search)
    {
        if (empty($search)) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            $q->where('operator_txn', 'like', "%{$search}%")
              ->orWhere('x_request_id', 'like', "%{$search}%")
              ->orWhere('method', 'like', "%{$search}%")
              ->orWhere('path', 'like', "%{$search}%");
        });
    }

    /**
     * Scope: Filter by HTTP method
     */
    public function scopeByMethod($query, $method)
    {
        if (empty($method)) {
            return $query;
        }

        return $query->where('method', $method);
    }

    /**
     * Scope: Filter by response status
     */
    public function scopeByStatus($query, $status)
    {
        if (empty($status)) {
            return $query;
        }

        return $query->where('response_status', $status);
    }

    /**
     * Scope: Filter by date range
     */
    public function scopeByDateRange($query, $dateFrom = null, $dateTo = null)
    {
        if (!empty($dateFrom)) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        if (!empty($dateTo)) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        return $query;
    }

    /**
     * Scope: Filter by date from
     */
    public function scopeByDateFrom($query, $dateFrom)
    {
        if (empty($dateFrom)) {
            return $query;
        }

        return $query->whereDate('created_at', '>=', $dateFrom);
    }

    /**
     * Scope: Filter by date to
     */
    public function scopeByDateTo($query, $dateTo)
    {
        if (empty($dateTo)) {
            return $query;
        }

        return $query->whereDate('created_at', '<=', $dateTo);
    }

    /**
     * Scope: Apply all filters from request
     */
    public function scopeApplyFilters($query, $request)
    {
        return $query->search($request->get('search'))
                    ->byMethod($request->get('method'))
                    ->byStatus($request->get('status'))
                    ->byDateFrom($request->get('date_from'))
                    ->byDateTo($request->get('date_to'));
    }

    /**
     * Scope: Order by latest
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope: Successful calls (2xx status codes)
     */
    public function scopeSuccessful($query)
    {
        return $query->whereBetween('response_status', [200, 299]);
    }

    /**
     * Scope: Error calls (4xx and 5xx status codes)
     */
    public function scopeErrors($query)
    {
        return $query->where('response_status', '>=', 400);
    }

    /**
     * Scope: Today's logs
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope: This week's logs
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    /**
     * Scope: This month's logs
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);
    }
}
