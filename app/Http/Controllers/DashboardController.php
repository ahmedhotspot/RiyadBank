<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $now = now();

        $startSix = $now->copy()->startOfMonth()->subMonths(5);
        $endSix = $now->copy()->endOfMonth();

        $cacheKey = 'dashboard.stats.user_'.(auth()->id() ?? 'guest');

        $stats = Cache::remember($cacheKey, 300, function () use ($startSix, $endSix) {

            $totalCustomers = (int) Customer::count();

            $newCustomersThisMonth = (int) Customer::whereBetween('created_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])->count();

            $offersAgg = Offer::selectRaw("
            COUNT(*)                                                                                AS totalOffers,
            SUM(CASE WHEN offerStatus IN ('OFFER_PENDING','OFFER_APPROVED') THEN 1 ELSE 0 END)      AS activeOffers,
            SUM(CASE WHEN offerStatus = 'OFFER_APPROVED' THEN 1 ELSE 0 END)                         AS approvedOffers,
            SUM(CASE WHEN offerStatus = 'OFFER_REJECTED' THEN 1 ELSE 0 END)                         AS rejectedOffers
        ")->first();

            $approvedOffersList = Offer::where('offerStatus', 'OFFER_APPROVED')
                ->get(['id', 'response']);

            $extractLoan = function ($offer) {
                $resp = is_string($offer->response)
                    ? json_decode($offer->response, true)
                    : (is_object($offer->response) ? (array) $offer->response : $offer->response);

                $candidates = [
                    'loan_amount',
                    'LoanAmount',
                    'totalLoanAmount',
                    'response.totalLoanAmount',
                    'response.body.totalLoanAmount',
                    'response.body.totalFinanceAmount',
                    'payload.totalLoanAmount',
                    'data.totalLoanAmount',
                ];

                foreach ($candidates as $path) {
                    $v = data_get($resp, $path);
                    if (is_numeric($v)) {
                        return (float) $v;
                    }
                }

                return 0.0;
            };

            $totalLoanAmount = (float) $approvedOffersList->sum($extractLoan);
            $approvedCount = (int) $approvedOffersList->count();
            $averageLoanAmount = $approvedCount > 0 ? ($totalLoanAmount / $approvedCount) : 0.0;

            $maritalStatusStats = Customer::select('marital_status', DB::raw('COUNT(*) AS count'))
                ->groupBy('marital_status')
                ->get()
                ->map(function ($row) {
                    $tmp = new Customer(['marital_status' => $row->marital_status]);
                    $row->marital_status_color = $tmp->marital_status_color ?? null;
                    $row->marital_status_text = $tmp->marital_status_text ?? (string) $row->marital_status;

                    return $row;
                });

            $rawMonthly = Offer::selectRaw('YEAR(created_at) AS y, MONTH(created_at) AS m, COUNT(*) AS count')
                ->whereBetween('created_at', [$startSix, $endSix])
                ->groupBy('y', 'm')
                ->orderBy('y')
                ->orderBy('m')
                ->get()
                ->keyBy(function ($row) {
                    return sprintf('%04d-%02d', $row->y, $row->m);
                });

            $period = CarbonPeriod::create($startSix->copy()->startOfMonth(), '1 month', $endSix->copy()->startOfMonth());

            $monthlyOffers = collect();
            foreach ($period as $m) {
                $key = $m->format('Y-m');
                $found = $rawMonthly->get($key);
                $monthlyOffers->push([
                    'year' => (int) $m->year,
                    'month' => (int) $m->month,
                    'label' => $m->isoFormat('MMM YYYY'),
                    'count' => (int) ($found->count ?? 0),
                ]);
            }

            $recentCustomers = Customer::latest('created_at')
                ->limit(5)
                ->get(['id', 'name', 'email', 'mobile_phone', 'created_at']);

            $recentOffers = Offer::with(['customer:id,name'])
                ->latest('created_at')
                ->limit(5)
                ->get(['id', 'offer_id', 'offerStatus', 'customer_id', 'created_at']);

            $offerStatusStats = Offer::select('offerStatus', DB::raw('COUNT(*) AS count'))
                ->groupBy('offerStatus')
                ->get()
                ->map(function ($row) {
                    $tmp = new Offer(['offerStatus' => $row->offerStatus]);
                    $row->status_text = $tmp->status_text ?? (string) $row->offerStatus;
                    $row->status_color = $tmp->status_color ?? '#999999';

                    return $row;
                });

            return [
                'totalCustomers' => $totalCustomers,
                'newCustomersThisMonth' => $newCustomersThisMonth,

                'totalOffers' => (int) $offersAgg->totalOffers,
                'activeOffers' => (int) $offersAgg->activeOffers,
                'approvedOffers' => (int) $offersAgg->approvedOffers,
                'rejectedOffers' => (int) $offersAgg->rejectedOffers,

                'totalLoanAmount' => $totalLoanAmount,
                'averageLoanAmount' => $averageLoanAmount,

                'maritalStatusStats' => $maritalStatusStats,
                'monthlyOffers' => $monthlyOffers,

                'recentCustomers' => $recentCustomers,
                'recentOffers' => $recentOffers,
                'offerStatusStats' => $offerStatusStats,
            ];
        });

        return view('dashboard.index', $stats);
    }
}
