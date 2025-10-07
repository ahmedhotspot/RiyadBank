<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // إحصائيات العملاء
        $totalCustomers = Customer::count();
        $newCustomersThisMonth = Customer::whereMonth('created_at', Carbon::now()->month)
                                        ->whereYear('created_at', Carbon::now()->year)
                                        ->count();

        // إحصائيات العروض
        $totalOffers = Offer::count();
        $activeOffers = Offer::whereIn('offerStatus', ['OFFER_PENDING', 'OFFER_APPROVED'])->count();
        $approvedOffers = Offer::where('offerStatus', 'OFFER_APPROVED')->count();
        $rejectedOffers = Offer::where('offerStatus', 'OFFER_REJECTED')->count();

        // إجمالي قيمة القروض 
        $approvedOffersList = Offer::where('offerStatus', 'OFFER_APPROVED')->get();
        $totalLoanAmount = $approvedOffersList->sum(function($offer) {
            return $offer->loan_amount ?? 0;
        });

        // متوسط قيمة القرض
        $averageLoanAmount = $approvedOffersList->count() > 0 ?
            $totalLoanAmount / $approvedOffersList->count() : 0;

        // إحصائيات الحالة الاجتماعية للعملاء مع إضافة marital_status_color
        $maritalStatusStats = Customer::select('marital_status', DB::raw('count(*) as count'))
                                    ->groupBy('marital_status')
                                    ->get()
                                    ->map(function($stat) {
                                        // إنشاء customer مؤقت للحصول على الـ accessor
                                        $tempCustomer = new Customer(['marital_status' => $stat->marital_status]);
                                        $stat->marital_status_color = $tempCustomer->marital_status_color;
                                        return $stat;
                                    });

        // إحصائيات العروض حسب الشهر (آخر 6 أشهر)
        $monthlyOffers = Offer::select(
                            DB::raw('MONTH(created_at) as month'),
                            DB::raw('YEAR(created_at) as year'),
                            DB::raw('COUNT(*) as count')
                        )
                        ->where('created_at', '>=', Carbon::now()->subMonths(6))
                        ->groupBy('year', 'month')
                        ->orderBy('year', 'desc')
                        ->orderBy('month', 'desc')
                        ->get();

        // أحدث العملاء
        $recentCustomers = Customer::orderBy('created_at', 'desc')
                                 ->limit(5)
                                 ->get();

        // أحدث العروض
        $recentOffers = Offer::with('customer')
                           ->orderBy('created_at', 'desc')
                           ->limit(5)
                           ->get();

        // إحصائيات العروض حسب الحالة مع إضافة status_text و status_color
        $offerStatusStats = Offer::select('offerStatus', DB::raw('count(*) as count'))
                                ->groupBy('offerStatus')
                                ->get()
                                ->map(function($stat) {
                                    // إنشاء offer مؤقت للحصول على الـ accessors
                                    $tempOffer = new Offer(['offerStatus' => $stat->offerStatus]);
                                    $stat->status_text = $tempOffer->status_text;
                                    $stat->status_color = $tempOffer->status_color;
                                    return $stat;
                                });

        return view('dashboard.index', compact(
            'totalCustomers',
            'newCustomersThisMonth',
            'totalOffers',
            'activeOffers',
            'approvedOffers',
            'rejectedOffers',
            'totalLoanAmount',
            'averageLoanAmount',
            'maritalStatusStats',
            'monthlyOffers',
            'recentCustomers',
            'recentOffers',
            'offerStatusStats'
        ));
    }
}
