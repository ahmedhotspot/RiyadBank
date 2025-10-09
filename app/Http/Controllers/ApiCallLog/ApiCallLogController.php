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

        // If it's an AJAX request, return only the table rows and pagination
        if ($request->ajax()) {
            $html = view('dashboard.logs.partials.table-rows', compact('logs'))->render();
            $pagination = view('dashboard.logs.partials.pagination', compact('logs'))->render();

            return response()->json([
                'html' => $html,
                'pagination' => $pagination,
                'total' => $logs->total(),
                'current_page' => $logs->currentPage(),
                'last_page' => $logs->lastPage(),
            ]);
        }

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
