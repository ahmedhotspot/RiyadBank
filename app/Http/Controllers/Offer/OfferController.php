<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $offers = Offer::with('customer')->filter($request)->orderBy('created_at', 'desc')->paginate(10);

        // إذا كان الطلب AJAX، أرجع JSON مع HTML
        if ($request->ajax() || $request->expectsJson() || $request->is('api/*')) {
            $paginationHtml = '';
            if ($offers->hasPages()) {
                $paginationHtml = view('dashboard.offer.partials.pagination', compact('offers'))->render();
            }

            return response()->json([
                'offers' => $offers->items(),
                'total' => $offers->total(),
                'current_page' => $offers->currentPage(),
                'last_page' => $offers->lastPage(),
                'html' => view('dashboard.offer.partials.table-rows', ['offers' => $offers->items()])->render(),
                'pagination' => $paginationHtml
            ]);
        }

        return view('dashboard.offer.index', compact('offers'));
    }

    public function show(Offer $offer)
    {
        $offer->load('customer');

        return view('dashboard.offer.show', compact('offer'));
    }
}
