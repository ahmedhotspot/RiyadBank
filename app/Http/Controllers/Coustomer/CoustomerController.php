<?php

namespace App\Http\Controllers\Coustomer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function create()
    {
        // جلب قائمة المدن للاختيار منها
        $cities =City::all()->pluck('name', 'id');

        return view('dashboard.coustomer.create', compact('cities'));
    }

    public function store(StoreCustomerRequest $request)
    {
        try {
            // الحصول على البيانات المتحقق منها من الـ Request
            $validatedData = $request->validated();

            // Debug: Log the validated data
            Log::info('Customer creation attempt', ['data' => $validatedData]);

            // إنشاء العميل الجديد
            $customer = Customer::create($validatedData);

            // Debug: Log successful creation
            Log::info('Customer created successfully', ['customer_id' => $customer->id]);

            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => __('dashboard.customer_created_successfully'),
                    'customer' => $customer,
                    'redirect' => route('customers.show', $customer->id_information)
                ]);
            }

            return redirect()->route('customers.show', $customer->id_information)
                           ->with('success', __('dashboard.customer_created_successfully'));
        } catch (\Exception $e) {
            // Debug: Log the error
            Log::error('Error creating customer', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => __('dashboard.error_creating_customer'),
                    'error' => $e->getMessage()
                ], 500);
            }

            return back()->withInput()
                        ->with('error', __('dashboard.error_creating_customer'));
        }
    }

    public function show($id)
    {
        $customer = Customer::with('offers')->where('id_information', $id)->firstOrFail();
        return view('dashboard.coustomer.show', compact('customer'));
    }
}
