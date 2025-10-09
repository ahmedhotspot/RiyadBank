<?php

namespace App\Http\Controllers\Coustomer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CoustomerController extends Controller
{
    public function index(Request $request){
        // جلب العملاء مع الفلترة باستخدام الـ scope
        $customers = Customer::filter($request)->orderBy('created_at', 'desc')->paginate(10);

        // إذا كان الطلب AJAX، أرجع JSON مع HTML
        if ($request->ajax() || $request->expectsJson() || $request->is('api/*')) {
            // Always render pagination partial, even if no pages
            $paginationHtml = view('dashboard.coustomer.partials.pagination', compact('customers'))->render();

            return response()->json([
                'customers' => $customers->items(),
                'total' => $customers->total(),
                'current_page' => $customers->currentPage(),
                'last_page' => $customers->lastPage(),
                'html' => view('dashboard.coustomer.partials.table-rows', ['customers' => $customers->items()])->render(),
                'pagination' => $paginationHtml,
                'has_pages' => $customers->hasPages()
            ]);
        }

        return view('dashboard.coustomer.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::where('id_information', $id)->firstOrFail();
        $customer->load('offers');

        return view('dashboard.coustomer.show', compact('customer'));
    }
}
