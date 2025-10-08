<?php

namespace App\Http\Controllers\ApiCallLog;

use App\Http\Controllers\Controller;
use App\Models\ApiCallLog;
use Illuminate\Http\Request;

class ApiCallLogController extends Controller
{
    /**
     * Display a listing of API call logs.
     */
    public function index(Request $request)
    {
        $logs = ApiCallLog::applyFilters($request)
                          ->latest()
                          ->paginate(15);

        return view('dashboard.logs.index', compact('logs'));
    }

    /**
     * Display the specified API call log.
     */
    public function show(ApiCallLog $log)
    {
        return view('dashboard.logs.show', compact('log'));
    }




}
